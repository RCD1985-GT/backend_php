<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PartyController extends Controller
{
    protected $table = 'partys';

    protected $fillable = [
        'name', 'gameId'
    ];

    public function messages() {

        return $this->hasMany('App\Models\Message');

    }
}
