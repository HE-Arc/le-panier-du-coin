<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RequestsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/conditions-utilisation', [PageController::class, 'condition'])->name('terms');
Route::get('/qui-sommes-nous', [PageController::class, 'about'])->name('about');

Route::get('/annonces', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/recherche', [ArticlesController::class, 'index'])->name('search');
Route::get('/annonces/creer', [ArticlesController::class, 'create'])->name('articles.create');
Route::post('/annonces', [ArticlesController::class, 'store'])->name('articles.store');
Route::get('/annonces/{article}', [ArticlesController::class, 'details'])
    ->whereNumber('article')
    ->name('articles.show');

Route::get('/demandes', [RequestsController::class, 'index'])->name('requests.index');
Route::get('/demandes/creer', [RequestsController::class, 'create'])->name('requests.create');

Route::get('/connexion', [ManagementController::class, 'login'])->name('login');
Route::get('/inscription', [ManagementController::class, 'register'])->name('register');
Route::get('/mot-de-passe-oublie', [ManagementController::class, 'resetpwd'])->name('password.request');
Route::get('/tableau-de-bord', [ManagementController::class, 'dashboardBuyer'])->name('dashboard.buyer');
Route::get('/tableau-de-bord/vendeur', [ManagementController::class, 'dashboardSeller'])->name('dashboard.seller');
Route::get('/profil-vendeur', [ManagementController::class, 'seller'])->name('seller');


//TODO: adding route when the bdd was building
