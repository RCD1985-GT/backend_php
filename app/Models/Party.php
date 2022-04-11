<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    // FILLABLE
    protected $fillable = [ // SIGNIFICA QUE SOLO PUEDES RELLENAR EL CAMPO 'name'
        'name',
        'game_id',
        'user_id'
    ];


    // PUBLIC
    public function messages() { // POR QUE MESSAGES?

        return $this->hasMany('App\Models\Message');

    }

}
