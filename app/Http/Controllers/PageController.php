<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {

        // récupération des catégorie (comme pour la view annonces)
        $categories = Category::query()
            ->withCount(['articles' => fn ($query) => $query->where('status', 'available')])
            ->orderBy('title')
            ->get()
            ->filter(fn ($category) => $category->articles_count > 0)
            ->values();

        // Récupération du nombre des articles ouverts
        $nbArticles = Article::query()
            ->where('status', 'available')
            ->count();

        // récupération des demandes ouverts (publiées)
        $nbRequests = Request::query()
            ->where('status', 'open')
            ->whereNotNull('published_at')
            ->count();

        // récupération des 3 derniers articles
        $newArticles = Article::query()
            ->with(['category', 'seller'])
            ->where('status', 'available')
            ->latest('published_at')
            ->take(3)
            ->get();

        // récupération des 3 dernières demandes ouvertes
        $selectionRequests = Request::query()
            ->with(['category'])
            ->withCount('answers')
            ->where('status', 'open')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('index', compact('categories', 'nbArticles', 'selectionRequests', 'newArticles', 'nbRequests'));
    }

    public function condition(): View
    {
        return view('condition');
    }

    public function about(): View
    {
        return view('about');
    }
}
