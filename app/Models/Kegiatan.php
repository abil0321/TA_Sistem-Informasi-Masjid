<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'foto',
        'jumlah',
        'kategori_kegiatan_id',
        'user_id',
    ];

    protected $casts = [
        'foto' => 'array',
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
