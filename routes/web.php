<?php

use Illuminate\Support\Facades\Route;

// Import semua Controller yang dibutuhkan
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes - Amikom Event Hub
|--------------------------------------------------------------------------
*/

// --- RUTE AREA PENGGUNA (USER AREA) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// --- RUTE AREA ADMIN (ADMIN PANEL) ---
// Menggunakan Group dengan prefix 'admin' agar URL menjadi /admin/...
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    
    // Halaman Dashboard Admin (URL: /admin)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Halaman Kelola Event (URL: /admin/events)
    Route::get('/events', [AdminEventController::class, 'indexAdmin'])->name('events.index');
    
    // Halaman Laporan Transaksi (URL: /admin/transactions)
    Route::get('/transactions', [AdminEventController::class, 'transactions'])->name('transactions.index');

    // Halaman Kelola Kategori (URL: /admin/categories)
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});