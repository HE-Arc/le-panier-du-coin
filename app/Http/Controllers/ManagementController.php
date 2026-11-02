<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleView;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManagementController extends Controller
{
    public function dashboardBuyer(): View{
        return view('Management.dashboard.buyer');
    }

    public function dashboardSeller(Request $request): View
    {

        $articles = $request->user()
            ->articles()
            ->with(['conversations' => fn($q) => $q->withCount('messages')])
            ->orderByRaw('(published_at IS NULL)')
            ->orderByDesc('published_at')
            ->get();

        // Annonces actives du vendeur (les autres statuts ne comptent pas)
        $activeArticlesCount = $articles
            ->where('status', \App\Enums\ArticleStatus::Available)
            ->count();

        // Vues du mois courant sur l'ensemble des annonces du vendeur
        $viewCounterMonthly = ArticleView::query()
            ->whereIn('article_id', $articles->modelKeys())
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->count();

        $averageRating = Review::whereIn('article_id', $articles->modelKeys())
            ->avg('rating');


        return view('Management.dashboard.seller', compact('articles', 'activeArticlesCount', 'viewCounterMonthly', 'averageRating'));
    }

    public function resetpwd(): View{
        return view('Management.resetpwd');
    }

    public function seller(): View{
        return view('Management.seller_profil');
    }
}
