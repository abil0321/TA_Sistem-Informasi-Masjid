<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class TransaksiKeuangan extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $table = 'transaksi_keuangan';

    protected $fillable = [
        'saldo',
        'tanggal',
        'keterangan',
        'kategori_transaksi_id',
        'user_id',
        'kegiatan_id',
        'donasi_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the kategori transaksi that owns the transaksi keuangan.
     */
    public function kategoriTransaksi()
    {
        return $this->belongsTo(KategoriTransaksi::class, 'kategori_transaksi_id');
    }

    /**
     * Get the user that owns the transaksi keuangan.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the kegiatan that owns the transaksi keuangan.
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function donasi()
    {
        return $this->belongsTo(Donasi::class, 'donasi_id');
    }
}
