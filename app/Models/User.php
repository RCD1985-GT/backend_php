<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // ESTO ESTA APAGADO
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

    // FILLABLE
    protected $fillable = [// SIGNIFICA QUE SOLO PUEDES RELLENAR LOS CAMPOS 'email' y 'password'
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    // HIDDEN
    protected $hidden = [ // SIGNIFICA QUE NO SE VEN
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    // PROTECTED
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
