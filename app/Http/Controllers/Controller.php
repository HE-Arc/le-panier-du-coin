<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function index(){
        return view('home');
    }
    public function research(){
        return view('research');
    }
    public function condition(){
        return view('condition');
    }
    public function about(){
        return view('about');
    }
}
