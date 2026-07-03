<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes - AmikomEventHub
|--------------------------------------------------------------------------
*/

// Rute Publik Utama 
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [\App\Http\Controllers\EventController::class, 'show'])->name('events.show');


// ==========================================
// BLOK KODE RUTENYA ADMIN 
// ==========================================

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Grouping untuk URL berawalan /admin
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Rute Login bebas akses
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Mengamankan Route Administrasi di balik tembok (Middleware)
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', EventController::class);
        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    });
});

Route::get('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');