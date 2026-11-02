<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RequestsController extends Controller
{
    public function index(): View
    {
        return view('Articles.request_list');
    }

    public function create(): View
    {
        return view('Articles.request_adding');
    }
}
