<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // FILLABLE
    protected $fillable = [ // SIGNIFICA QUE SOLO PUEDES RELLENAR EL CAMPO 'body'
        'body'

    ];

    // PUBLIC
    public function messages() // POR QUE MESSAGES?
    {

        return $this->hasMany('App\Models\Message');
    }
}
