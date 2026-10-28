<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
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

        return view("research", compact("articles"));
    }

    public function details(string $article): View
    {
        return view('Articles.article_details', [
            'article' => $article,
        ]);
    }

    public function create(): View
    {
        return view('Articles.article_adding');
    }


}
