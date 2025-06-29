<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Kegiatan extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'jumlah',
        'kategori_kegiatan_id',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function kategoriKegiatan()
    {
        return $this->belongsTo(KategoriKegiatan::class, 'kategori_kegiatan_id');
    }

    /**
     * Get the user that owns the kegiatan.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
