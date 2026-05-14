<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import Controller yang hanya dibutuhkan
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Landing\LandingController;

// Halaman Utama / Landing
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Detail Produk (Public)
Route::get('/product/{slug}', [LandingController::class, 'showProduct'])
    ->name('products.show');

// Redirect Home (Logika dasar untuk mengarahkan user setelah auth)
Route::get('/home', function () {
    if (Auth::guard('web')->check()) {
        return redirect()->route('admin.dashboard'); // Pastikan route admin.dashboard ada di file route lain atau tambahkan nanti
    }
    if (Auth::guard('customer')->check()) {
        return redirect()->route('customer.dashboard');
    }
    return redirect()->route('landing');
})->name('home');

// Auth: Guest (Hanya untuk yang belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Auth: Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
