<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_telp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'user_id');
    }

    /**
     * Get the transaksi keuangan associated with the user.
     */
    public function transaksiKeuangans()
    {
        return $this->hasMany(TransaksiKeuangan::class, 'user_id');
    }

    /**
     * Get the pengumuman associated with the user.
     */
    public function pengumumans()
    {
        return $this->hasMany(Pengumuman::class, 'user_id');
    }

    /**
     * Get the donatur associated with the user.
     */
    public function donaturs()
    {
        return $this->hasMany(Donasi::class, 'user_id');
    }

    /**
     * Get the sessions associated with the user.
     */
    public function sessions()
    {
        return $this->hasMany(Session::class, 'user_id');
    }
}
