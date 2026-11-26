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
        return view('Articles.request_adding');
    }
}
