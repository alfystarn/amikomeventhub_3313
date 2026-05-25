<?php

use Illuminate\Support\Facades\Route;

// Import Controller Utama
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;

// Import Controller Admin (Sesuai Poin 5.4.2 Halaman 32)
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes - Amikom Event Hub
|--------------------------------------------------------------------------
*/

// --- AREA PENGGUNA (USER AREA) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// --- AREA ADMIN (ADMIN PANEL) ---
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard: /admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Poin 5.4.2: Resource Route untuk Kelola Event
    Route::resource('events', EventAdminController::class);
    
    // Rute Tambahan
    Route::get('/transactions', [EventAdminController::class, 'transactions'])->name('transactions.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});