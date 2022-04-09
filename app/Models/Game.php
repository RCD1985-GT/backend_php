<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // FILLABLE
    protected $fillable = [ // // SIGNIFICA QUE SOLO PUEDES RELLENAR LOS CAMPOS 'title' y 'url'
        'title', 'url'
    ];

    public function user() { // POR QUE USER?

        return $this->hasMany('App\Models\Party');

    }
}
