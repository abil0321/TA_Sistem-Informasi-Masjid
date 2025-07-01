<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', action: [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tentang', action: [Controllers\TentangController::class, 'index'])->name('tentang');

Route::get('/galeri', action: [Controllers\GaleriController::class, 'index'])->name('galeri');

Route::get('/laporan/transaksi-keuangan', action: [Controllers\LaporanController::class, 'transaksi_keuangan'])->name('transaksi-keuangan');
Route::get('/laporan/pemasukan', action: [Controllers\LaporanController::class, 'pemasukan'])->name('pemasukan');
Route::get('/laporan/pengeluaran', action: [Controllers\LaporanController::class, 'pengeluaran'])->name('pengeluaran');

Route::get('/pengumuman', action: [Controllers\PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/{id}', [Controllers\PengumumanController::class, 'show'])->name('pengumuman.detail');

Route::get('/kontak', action: [Controllers\KontakController::class, 'index'])->name('kontak');

Route::get('/donasi', action: [Controllers\FormDonasiController::class, 'index'])->name('form-donasi');
Route::post('/donasi/konfirmasi', [Controllers\FormDonasiController::class, 'konfirmasi'])->name('konfirmasi');
Route::post('/donasi/konfirmasi-callback', [Controllers\FormDonasiController::class, 'callback'])->name('callback');
Route::get('/donasi/invoice/{id}', [Controllers\FormDonasiController::class, 'invoice'])->name('invoice');

// 🔹 Middleware Auth untuk mengatur akses berdasarkan role
// Route::middleware(['auth'])->group(function () {
//   Route::get('/admin', function () {
//     return view('admin.dashboard');
//   })->middleware('role:Admin|Pengurus')->name('filament.admin.pages.dashboard');

//   Route::get('/jamaah/home', function () {
//     return view('jamaah.home');
//   })->middleware('role:Jamaah')->name('filament.jamaah.pages.dashboard');
// });
// Route::get('/blog/test_api', action: [Controllers\BlogController::class, 'test']);

// Route::get('/contact', action: [Controllers\ContactController::class, 'index'])->name('contact');
