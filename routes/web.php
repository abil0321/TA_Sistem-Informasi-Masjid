<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', action: [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tentang', action: [Controllers\TentangController::class, 'index'])->name('tentang');

Route::get('/galeri', action: [Controllers\GaleriController::class, 'index'])->name('galeri');

Route::get('/pengumuman', action: [Controllers\PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/{id}', [Controllers\PengumumanController::class, 'show'])->name('pengumuman.detail');

// Route::get('/blog/{id}', [Controllers\BlogController::class, 'show']);

// Route::get('/blog/test_api', action: [Controllers\BlogController::class, 'test']);
Route::get('/kontak', action: [Controllers\KontakController::class, 'index'])->name('kontak');

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
