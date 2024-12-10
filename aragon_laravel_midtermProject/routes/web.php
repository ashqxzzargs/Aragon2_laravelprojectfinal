<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $products = Product::all();
    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('product/edit/{productId}', [ProductController::class, 'edit_product_form'])->name('product.edit');
    Route::patch('product/edit/{productId}', [ProductController::class, 'edit_product'])->name('product.edit');
    Route::post('product/store', [ProductController::class, 'store_product'])->name('product.store');
    Route::delete('product/{productId}', [ProductController::class, 'destroy_product'])->name('product.destroy');
});

require __DIR__.'/auth.php';
