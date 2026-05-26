<?php

use Illuminate\Support\Facades\Route;

// Import Controller Utama
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;

// Import Controller Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PartnerController;

/*
|--------------------------------------------------------------------------
| Web Routes - Amikom Event Hub
|--------------------------------------------------------------------------
*/

// --- AREA PENGGUNA (USER AREA) ---
// Homepage: Di sini data partner akan ditampilkan (Soal 4)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk Katalog & Profil agar tidak 404 lagi
Route::get('/katalog', [EventController::class, 'index'])->name('katalog');
Route::get('/profil', function() {
    return "Halaman Profil (Dalam Pengembangan)"; // Placeholder supaya tidak 404 saat didemo
})->name('profil');

Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// --- AREA ADMIN (ADMIN PANEL) ---
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard: /admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Kelola Event
    Route::resource('events', EventAdminController::class);
    
    // Kelola Kategori (Soal 1 & 3)
    Route::resource('categories', CategoryController::class);
    
    // Kelola Partner (Soal 2 & 3)
    Route::resource('partners', PartnerController::class);
    
    Route::get('/transactions', [EventAdminController::class, 'transactions'])->name('transactions.index');
});