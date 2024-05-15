<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isRt()
    {
        return $this->level_id === 1; // Assuming RT role ID is 1
    }

    /**
     * Check if the user has RW role.
     *
     * @return bool
     */
    public function isRw()
    {
        return $this->level_id === 2; // Assuming RW role ID is 2
    }

    /**
     * Check if the user has Penduduk (PD) role.
     *
     * @return bool
     */
    public function isPd()
    {
        return $this->level_id === 3; // Assuming Penduduk role ID is 3
    }
    // inverse one to Many ke tabel role
    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
