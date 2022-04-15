<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    // FILLABLE
    protected $fillable = [ 
        'name',
        'game_id',
        
    ];


    // PUBLIC
    public function messages() { 

        return $this->hasMany('App\Models\Message');

    }

}
