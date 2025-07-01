<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriTransaksi extends Model
{
    use HasFactory;
    const PEMASUKAN = 1;
    const PENGELUARAN = 2;

    protected $table = 'kategori_transaksi';

    protected $fillable = [
        'nama',
    ];
}
