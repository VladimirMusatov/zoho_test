<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/',[MainController::class, 'index'])->name('home');
Route::get('/deal-form', [MainController::class, 'DealForm'])->name('deal-form');
Route::get('/deal-store',[MainController::class, 'DealStore'])->name('deal-store');

Route::get('/accounts-form', [MainController::class, 'AccountForm'])->name('account-form');
Route::get('/accounts-store', [MainController::class, 'AccountStore'])->name('account-store');
