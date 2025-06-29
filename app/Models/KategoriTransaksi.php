<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class KategoriTransaksi extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    const PEMASUKAN = 1;
    const PENGELUARAN = 2;

    protected $table = 'kategori_transaksi';

    protected $fillable = [
        'nama',
    ];
}
