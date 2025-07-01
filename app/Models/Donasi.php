<?php

namespace App\Models;

use App\Observers\DonasiObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Donasi extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'donasi';

    protected $fillable = [
        'nama_donatur',
        'email',
        'no_telp',
        'jumlah',
        'status',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the donatur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
