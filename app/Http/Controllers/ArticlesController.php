<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ArticlesController extends Controller
{
    public function index(): View
    {
        return view('research');
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
