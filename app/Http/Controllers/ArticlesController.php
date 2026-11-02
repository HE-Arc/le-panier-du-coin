<?php

namespace App\Http\Controllers;

use App\Enums\ArticleCondition;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use Illuminate\Validation\Rule;

class ArticlesController extends Controller
{
    // Slug du formulaire => libellé stocké dans articles.location
    private const QUARTIERS = [
        'centre-ville' => 'Centre-ville',
        'tilleuls' => 'Quartier des Tilleuls',
        'faubourg-nord' => 'Faubourg Nord',
        'rue-des-ecoles' => 'Rue des Écoles',
    ];

    // Méthode pour afficher tous les articles de la BDD
    public function index(): View{
        $articles = Article::query()
            ->with(['category', 'seller'])
            ->where('status', 'available')
            ->latest('published_at')
            ->paginate(9);

        $categories = Category::query()
            ->withCount(['articles' => fn ($query) => $query->where('status', 'available')])
            ->orderBy('title')
            ->get()
            ->filter(fn ($category) => $category->articles_count > 0)
            ->values();

        $locations = Article::query()
            ->where('status', 'available')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        $priceRanges = Article::query()
            ->where('status', 'available')
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        $conditions = ArticleCondition::cases();

        return view('research', compact('articles', 'categories', 'locations', 'conditions', 'priceRanges'));
    }

    public function details(Request $request, Article $article): View{

        // Le propriétaire ne gonfle pas son propre compteur de vues.
        if ($request->user()?->id !== $article->seller_id) {
            $article->increment('views');
            $article->articleViews()->create();
        }

        $article->load(['category', 'seller', 'pictures', 'primaryPicture']);

        return view('Articles.article_details', compact('article'));
    }

    public function create(): View{
        $categories = Category::query()->orderBy('title')->get();

        return view('Articles.article_adding', compact('categories'));
    }

    //Ajout d'une annonce
    public function store(Request $request): RedirectResponse{
        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:80'],
            'description' => ['required', 'string', 'max:2000'],
            'prix' => ['required', 'numeric', 'min:0', 'max:999999'],
            'brand' => ['required', 'string', 'max:255'],
            'negociation' => ['sometimes', 'boolean'],
            'categorie' => ['required', Rule::exists('categories', 'id')],
            'etat' => ['required', Rule::in(array_column(ArticleCondition::cases(), 'value'))],
            'quartier' => ['required', Rule::in(array_keys(self::QUARTIERS))],
            'disponibilite' => ['nullable', 'string', 'max:255'],
            'certification' => ['accepted'],
        ]);

        Article::create([
            'title'        => $validated['titre'],
            'description'  => $validated['description'],
            'price'        => $validated['prix'],
            'brand'        => $validated['brand'],
            'negotiable'   => $request->boolean('negociation'),
            'category_id'  => $validated['categorie'],
            'condition'    => $validated['etat'],
            'location'     => self::QUARTIERS[$validated['quartier']],
            'availability' => $validated['disponibilite'] ?? '',
            'seller_id'    => Auth::id(),
            'status'       => 'available',
            'views'        => 0,
            'published_at' => now(),
        ]);

        return redirect()
            ->route('dashboard.seller')
            ->with('success', 'Annonce créée avec succès.');
    }
    //pour récupérer les infos d'un article dans la page d'édition
    public function edit(Request $request, Article $article): View{
        $this->authorizeOwner($request, $article);

        $categories = Category::query()->orderBy('title')->get();

        $conditions = ArticleCondition::cases();

        $quartiers = self::QUARTIERS;

        $quartierSlug = array_search($article->location, self::QUARTIERS, true) ?: null;

        return view('Articles.article_edit', compact('article', 'categories', 'conditions', 'quartiers', 'quartierSlug'));
    }

    // mettre à jour un article dans la BDD
    public function update(Request $request, Article $article): RedirectResponse{
        $this->authorizeOwner($request, $article);

        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:80'],
            'description' => ['required', 'string', 'max:2000'],
            'prix' => ['required', 'numeric', 'min:0', 'max:999999'],
            'brand' => ['required', 'string', 'max:255'],
            'negociation' => ['sometimes', 'boolean'],
            'categorie' => ['required', Rule::exists('categories', 'id')],
            'etat' => ['required', Rule::in(array_column(ArticleCondition::cases(), 'value'))],
            'quartier' => ['required', Rule::in(array_keys(self::QUARTIERS))],
            'disponibilite' => ['nullable', 'string', 'max:255'],
            'certification' => ['accepted'],
        ]);

        $article->update([
            'title' => $validated['titre'],
            'description' => $validated['description'],
            'price' => $validated['prix'],
            'brand' => $validated['brand'],
            'negotiable' => $request->boolean('negociation'),
            'category_id' => $validated['categorie'],
            'condition' => $validated['etat'],
            'location' => self::QUARTIERS[$validated['quartier']],
            'availability' => $validated['disponibilite'] ?? '',
        ]);

        return redirect()
            ->route('dashboard.seller')
            ->with('success', 'Annonce mise à jour.');
    }

    // supprimer un article de la BDD
    public function destroy(Request $request, Article $article): RedirectResponse{
        $this->authorizeOwner($request, $article);
        $article->delete();

        return redirect()
            ->route('dashboard.seller')
            ->with('success', 'Annonce supprimée.');
    }

    // seul le vendeur propriétaire de l'annonce peut la modifier.
    private function authorizeOwner(Request $request, Article $article): void {
        abort_unless($request->user()?->id === $article->seller_id, 403);
    }
}
