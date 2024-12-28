<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id', // Tambahkan role_id agar dapat diisi secara mass assignment
    ];

    /**
     * Attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relasi dengan model Role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Periksa apakah user memiliki role tertentu.
     *
     * @param string $roleName
     * @return bool
     */
    public function hasRole(string $roleName): bool
    {
        return $this->role->role_name === $roleName;
    }

    public function beliCash()
    {
        return $this->hasMany(BeliCash::class, 'motor_kode', 'motor_kode');
    }

    public function beliKredit()
    {
        return $this->hasMany(BeliKredit::class, 'motor_kode', 'motor_kode');
    }
}
