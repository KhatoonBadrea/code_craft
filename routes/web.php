<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/create_products', [ProductController::class, 'create'])->name('products.create')->middleware('auth');
Route::post('/store_products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/available_products', [ProductController::class, 'available_products'])->name('available_products');

Route::get('/search', [ProductController::class, 'search'])->name('search');


Route::get('/edit.products{product}', [ProductController::class, 'edit'])->name('edit');
Route::put('/update.products{product}', [ProductController::class, 'update'])->name('update');


Route::delete('/delete.products{product}', [ProductController::class, 'delete'])->name('delete');
