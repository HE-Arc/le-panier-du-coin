<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;


Route::get('/', [Controller::class, 'index'])->name('home');

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/', [Controller::class, 'research'])->name('research');
Route::get('/', [Controller::class, 'condition'])->name('condition');
Route::get('/', [Controller::class, 'about'])->name('about');


Route::get('/', [ManagementController::class, 'dashboard'])->name('dashboard');
Route::get('/', [ManagementController::class, 'login'])->name('login');
Route::get('/', [ManagementController::class, 'register'])->name('register');
Route::get('/', [ManagementController::class, 'resetpwd'])->name('resetpwd');
Route::get('/', [ManagementController::class, 'seller'])->name('seller');


Route::get('/', [ArticlesController::class, 'details'])->name('details');
Route::get('/', [ArticlesController::class, 'aAdding'])->name('aAdding');
Route::get('/', [ArticlesController::class, 'request'])->name('request');
Route::get('/', [ArticlesController::class, 'rAdding'])->name('rAdding');
