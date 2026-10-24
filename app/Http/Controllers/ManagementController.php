<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    //
    public function dashboard() {
        return view('Management.dashboard');
    }
    public function login() {
        return view('Management.login');
    }
    public function register() {
        return view('Management.register');
    }
    public function resetpwd() {
        return view('Management.resetpwd');
    }
    public function seller() {
        return view('Management.seller_profil');
    }
}
