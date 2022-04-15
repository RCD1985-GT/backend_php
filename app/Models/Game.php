<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // FILLABLE
    protected $fillable = [ 
        'title', 'url'
    ];

    public function user() { 

        return $this->hasMany('App\Models\Party');

    }
}
