<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/',[MainController::class, 'index'])->name('main');
Route::get('/deal-form', [MainController::class, 'DealForm'])->name('deal-form');
Route::get('/deal-store',[MainController::class, 'DealStore'])->name('deal-store');
