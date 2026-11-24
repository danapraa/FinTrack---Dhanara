<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/masuk', [AuthController::class, 'login'])->middleware('throttle:6,1');

    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/daftar', [AuthController::class, 'register'])->middleware('throttle:6,1');
});

Route::middleware('auth')->group(function () {
    Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('dompet', WalletController::class)
        ->except('show')
        ->parameters(['dompet' => 'wallet'])
        ->names('wallets');

    // ---- Halaman sementara: dihapus satu per satu saat fiturnya dibangun ----
    Route::view('/transaksi', 'placeholder', ['title' => 'Transaksi'])->name('transactions.index');
    Route::view('/transaksi/tambah', 'placeholder', ['title' => 'Tambah Transaksi'])->name('transactions.create');
    Route::view('/kategori', 'placeholder', ['title' => 'Kategori'])->name('categories.index');
    Route::view('/anggaran', 'placeholder', ['title' => 'Anggaran'])->name('budgets.index');
    Route::view('/target', 'placeholder', ['title' => 'Target Tabungan'])->name('goals.index');
    Route::view('/tagihan', 'placeholder', ['title' => 'Tagihan'])->name('bills.index');
    Route::view('/utang', 'placeholder', ['title' => 'Utang & Piutang'])->name('debts.index');
    Route::view('/laporan', 'placeholder', ['title' => 'Laporan'])->name('reports.index');
    Route::view('/profil', 'placeholder', ['title' => 'Profil'])->name('profile.edit');
});

if (app()->isLocal()) {
    Route::view('/styleguide', 'styleguide');
}
