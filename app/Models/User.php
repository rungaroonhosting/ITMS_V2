<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    // ให้ Spatie ใช้ guard 'web' (ตรงกับการล็อกอิน)
    protected $guard_name = 'web';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        // ถ้าใช้ Laravel 10/11 ที่มี hashed casts:
        // 'password' => 'hashed',
    ];
}
