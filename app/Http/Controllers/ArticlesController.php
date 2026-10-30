<?php

namespace App\Http\Controllers;

use App\Enums\ArticleCondition;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class ArticlesController extends Controller
{
    // Méthode pour afficher tous les articles de la BDD
    public function index(): View
    {
        $articles = Article::query()
            ->with(["category", "seller"])
            ->where("status", "available")
            ->latest("published_at")
            ->paginate(9);

        $categories = Category::query()
            ->withCount(["articles" => fn ($query) => $query->where("status", "available")])
            ->orderBy("title")
            ->get()
            ->filter(fn ($category) => $category->articles_count > 0)
            ->values();

        $locations = Article::query()
            ->where("status", "available")
            ->distinct()
            ->orderBy("location")
            ->pluck("location");

        $priceRanges = Article::query()
            -> where("status", "available")
            ->selectRaw("MIN(price) as min_price, MAX(price) as max_price")
            ->first();

        $conditions = ArticleCondition::cases();

        return view("research", compact("articles", "categories", "locations", "conditions", "priceRanges"));
    }

    public function details(Article $article): View
    {
        $article->increment("views");

        $article->load(["category", "seller", "pictures","primaryPicture"]);
        return view("Articles.article_details", compact("article"));
    }

    public function create(): View
    {
        return view('Articles.article_adding');
    }

    public function store(Request $request): RedirectResponse{
    $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric|min:0',
            'brand' => 'nullable|string',
            'availability' => 'required|string',
            'condition' => 'required',
            'negotiable' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validatedData['seller_id'] = Auth::id();
        $validatedData['status'] = 'draft';
        $validatedData['views'] = 0;
        $validatedData['published_at'] = now();

        Article::create($validatedData);

        return redirect()->route('articles.index')->with('success','annonce créée avec succès.');
    }
}
