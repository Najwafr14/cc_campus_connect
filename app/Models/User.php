<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\SuratPengajuan;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role_id',
        'prodi_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
public function role()
{
    return $this->belongsTo(Role::class);
}

// public function hasRole($roleName)
// {
//     return strtolower($this->role->nama_role) === strtolower($roleName);
// }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function suratPengajuans()
    {
        return $this->hasMany(SuratPengajuan::class);
    }

    public function isMahasiswa()
    {
        return $this->role_id === 1;
    }

    public function isKaprodi()
    {
        return $this->role_id === 2;
    }

    public function isTataUsaha()
    {
        return $this->role_id === 3;
    }
}