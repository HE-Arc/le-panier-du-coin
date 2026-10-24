<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ManagementController extends Controller
{
    public function dashboardBuyer(): View
    {
        return view('Management.dashboard.buyer');
    }

    public function dashboardSeller(): View
    {
        return view('Management.dashboard.seller');
    }

    public function login(): View
    {
        return view('Management.login');
    }

    public function register(): View
    {
        return view('Management.register');
    }

    public function resetpwd(): View
    {
        return view('Management.resetpwd');
    }

    public function seller(): View
    {
        return view('Management.seller_profil');
    }
}
