<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

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
