<?php

namespace App\Models;

use App\Observers\DonasiObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Donasi extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'donasi';

    protected $fillable = [
        'nama_donatur',
        'email',
        'no_telp',
        'jumlah',
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
