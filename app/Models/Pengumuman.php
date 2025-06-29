<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Pengumuman extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'isi',
        'kategori_pengumuman_id',
        'referensi',
        'tanggal',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the kategori pengumuman that owns the pengumuman.
     */
    public function kategoriPengumuman()
    {
        return $this->belongsTo(KategoriPengumuman::class, 'kategori_pengumuman_id');
    }

    /**
     * Get the user that owns the pengumuman.
     */
    public function user()
    {
        // dd($this->belongsTo(User::class, 'user_id'));
        return $this->belongsTo(User::class, 'user_id');
    }
}
