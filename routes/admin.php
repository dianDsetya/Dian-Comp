<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('/export/{type}', [UserController::class, 'export'])->name('export');
    Route::post('/import', [UserController::class, 'import'])->name('import');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');

    // Fitur Tambahan: Export & Import
    Route::get('/export/{type}', [ProductController::class, 'export'])->name('export');
    Route::post('/import', [ProductController::class, 'import'])->name('import');
});
