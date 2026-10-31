<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ManagementController extends Controller
{
    public function dashboardBuyer(): View{
        return view('Management.dashboard.buyer');
    }

    public function dashboardSeller(Request $request): View{
        $articles = $request->user()
            ->articles()
            ->with(['conversations' => fn ($q) => $q->withCount('messages')])
            ->orderByRaw('(published_at IS NULL)')
            ->orderByDesc('published_at')
            ->get();

        return view('Management.dashboard.seller', compact('articles'));
    }

    public function resetpwd(): View{
        return view('Management.resetpwd');
    }

    public function seller(): View{
        return view('Management.seller_profil');
    }
}
