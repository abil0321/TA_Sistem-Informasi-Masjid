<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonasiController;
use App\Http\Controllers\Api\DonaturControllerApi;
use App\Http\Controllers\Api\KategoriKegiatanController;
use App\Http\Controllers\Api\KategoriPengumumanController;
use App\Http\Controllers\Api\KategoriTransaksiController;
use App\Http\Controllers\Api\KegiatanController;
use App\Http\Controllers\Api\PengumumanController;
use App\Http\Controllers\Api\TransaksiKeuanganController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\FormDonasiController;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/donasi/konfirmasi-callback', [FormDonasiController::class, 'callback']);

Route::post('/login_api', [AuthController::class, 'login']);

Route::get('/donasi_api', [DonasiController::class, 'index']);
Route::get('/donasi_api/{donasi_api}', [DonasiController::class, 'show']);

Route::get('/pengumuman_api', [PengumumanController::class, 'index']);
Route::get('/pengumuman_api/{pengumuman_api}', [PengumumanController::class, 'show']);

Route::get('/kegiatan_api', [KegiatanController::class, 'index']);
Route::get('/kegiatan_api/{kegiatan_api}', [KegiatanController::class, 'show']);

Route::get('/transaksi_api', [TransaksiKeuanganController::class, 'index']);
Route::get('/transaksi_api/{transaksi_api}', [TransaksiKeuanganController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::apiResource('user_api', UserController::class);
    Route::get('/cek_token_api', [AuthController::class, 'cek_token']);
    Route::post('/logout_api', [AuthController::class, 'logout']);
    Route::middleware('auth:sanctum', 'role:admin')->group(function () {
        Route::apiResource('user_api', UserController::class);
        Route::apiResource('role_api', UserController::class);
        Route::apiResource('permission_api', UserController::class);
    });

    Route::apiResource('kegiatan_api', KegiatanController::class)->except(['index', 'show']);
    Route::apiResource('pengumuman_api', PengumumanController::class)->except(['index', 'show']);
    Route::apiResource('donasi_api', DonasiController::class)->except(['index']);
    Route::apiResource('transaksi_api', TransaksiKeuanganController::class)->except(['index', 'show']);

    Route::apiResource('kategori_pengumuman_api', KategoriPengumumanController::class);
    Route::apiResource('kategori_kegiatan_api', KategoriKegiatanController::class);
    Route::apiResource('kategori_transaksi_api', KategoriTransaksiController::class);
});
