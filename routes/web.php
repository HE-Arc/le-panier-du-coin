<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RequestsController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Route;

//------------------------------------------- Routes pour element "statique" -------------------------------------------
Route::get('/', [PageController::class, 'index'])
    ->name('home');
Route::get('/conditions-utilisation', [PageController::class, 'condition'])
    ->name('terms');
Route::get('/qui-sommes-nous', [PageController::class, 'about'])
    ->name('about');  

//---------------------------------------------- Routes pour les articles ----------------------------------------------
Route::get('/annonces', [ArticlesController::class, 'index'])
    ->name('articles.index');
Route::get('/annonces/creer', [ArticlesController::class, 'create'])->name('articles.create');
Route::post('/annonces', [ArticlesController::class, 'store'])
    ->middleware('auth')
    ->name('articles.store');
Route::get('/annonces/{article}/editer', [ArticlesController::class, 'edit'])
    ->middleware('auth')
    ->whereUuid('article')
    ->name('articles.edit');
Route::put('/annonces/{article}', [ArticlesController::class, 'update'])
    ->middleware('auth')
    ->whereUuid('article')
    ->name('articles.update');
Route::get('/annonces/{article}', [ArticlesController::class, 'details'])
    ->whereUuid('article')
    ->name('articles.show');
Route::delete('/annonces/{article}', [ArticlesController::class, 'destroy'])
    ->middleware('auth')
    ->whereUuid('article')
    ->name('articles.destroy');
Route::get('/recherche', [ArticlesController::class, 'index'])->name('search');

//---------------------------------------------- Routes pour les demandes ----------------------------------------------
Route::get('/demandes', [RequestsController::class, 'index'])
    ->name('requests.index');
Route::get('/demandes/creer', [RequestsController::class, 'create'])
    ->name('requests.create');

//-------------------------------------------- Routes pour les utilisateurs --------------------------------------------
Route::get('/connexion', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/connexion', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store');
Route::get('/inscription', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/inscription', [RegisteredUserController::class, 'store'])
    ->name('register.store');
Route::post('/deconnexion', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
Route::post("/mot-de-passe-oublie", [PasswordResetLinkController::class, "store"])
    ->middleware([RedirectIfAuthenticated::class, ThrottleRequests::class . ":3,1"])
    ->name("password.email");
Route::get("/reinitialiser-mot-de-passe/{token}", [NewPasswordController::class, "create"])
    ->middleware("guest")
    ->name("password.reset");
Route::post("/reinitialiser-mot-de-passe", [NewPasswordController::class, "store"])
    ->middleware("guest")
    ->name("password.update");
Route::delete('/compte', [ProfileController::class, 'destroy'])
    ->middleware('auth')
    ->name('profile.destroy');

//----------------------------------------- Routes pour la gestion utilisateur -----------------------------------------
Route::get('/tableau-de-bord', [ManagementController::class, 'dashboardBuyer'])
    ->middleware('auth')
    ->name('dashboard.buyer');
Route::get('/tableau-de-bord/vendeur', [ManagementController::class, 'dashboardSeller'])
    ->middleware('auth')
    ->name('dashboard.seller');
Route::get('/profil-vendeur', [ManagementController::class, 'seller'])
    ->name('seller');

// TODO: adding route when the bdd was building
