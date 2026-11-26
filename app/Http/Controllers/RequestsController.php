<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Request as Demande;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RequestsController extends Controller
{
        private const PAR_PAGE = 6;

    // Liste des demandes, filtrée selon les paramètres de l'URL
    public function index(Request $request): View {
        // Par défaut, seules les demandes ouvertes sont affichées
        $filters = $request->all() + ['statut' => [RequestStatus::Open->value]];

        // "Charger plus" augmente le nombre de demandes affichées (plafonné)
        $nombre = min(max((int) $request->input('nombre', self::PAR_PAGE), self::PAR_PAGE), 120);

        $demandes = Demande::forListing($filters)->paginate($nombre)->withQueryString();

        return view('Articles.request_list', [
            'demandes' => $demandes,
            'statutsActifs' => (array) $filters['statut'],
            'nombreSuivant' => $nombre + self::PAR_PAGE,
            ...Demande::listingMeta(),
        ]);
    }

    public function create(): View
    {
        return view('Articles.request_adding', [
            'categories' => Category::query()->orderBy('title')->get(),
            'quartiers' => ArticlesController::QUARTIERS,
            'quartierParDefaut' => array_search(auth()->user()?->neighborhood,
                ArticlesController::QUARTIERS, true) ?: null,
        ]);
    }

    public function store(Request $request): RedirectResponse{
        $request->user()->requests()->create([
            ...$this->validateDemande($request),
            'status' => RequestStatus::Open,
            'published_at' => now(),
        ]);

        return redirect()
            ->route('dashboard.buyer')
            ->with('success', 'Demande publiée.');
    }

    // Validation commune au dépôt et à la modification, renvoie les attributs du modèle
    private function validateDemande(Request $request, bool $withStatus = false): array
    {
        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'budget' => ['required', 'numeric', 'min:0', 'max:999999'],
            'categorie' => ['required', Rule::exists('categories', 'id')],
            // À la création, la date ne peut pas être passée (en modification, on garde la date existante possible)
            'date' => $withStatus ? ['required', 'date'] : ['required', 'date', 'after_or_equal:today'],
            'quartier' => ['required', Rule::in(array_keys(ArticlesController::QUARTIERS))],
            'statut' => [Rule::requiredIf($withStatus), Rule::enum(RequestStatus::class)],
        ]);

        return array_filter([
            'title' => $validated['titre'],
            'description' => $validated['description'],
            'budget' => $validated['budget'],
            'category_id' => $validated['categorie'],
            'target_date' => $validated['date'],
            'location' => ArticlesController::QUARTIERS[$validated['quartier']],
            'status' => $withStatus ? $validated['statut'] : null,
        ], fn ($value) => $value !== null);
    }
}
