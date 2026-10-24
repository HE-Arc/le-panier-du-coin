<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    public function details() {
        return view('Articles.article_details');
    }
    public function aAdding() {
        return view('Articles.article_adding');
    }
    public function request() {
        return view('Articles.request_list');
    }
    public function rAdding() {
        return view('Articles.request_adding');
    }
}
