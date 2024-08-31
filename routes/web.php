<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Categories Routes
Route::resource('categories', CategoryController::class);

// Materials Routes
Route::resource('materials', MaterialController::class);

// Material Transactions Routes
Route::get('material-transactions/create', [MaterialTransactionController::class, 'create'])->name('material-transactions.create');
Route::post('material-transactions', [MaterialTransactionController::class, 'store'])->name('material-transactions.store');
