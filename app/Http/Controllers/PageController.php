<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('index');
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
