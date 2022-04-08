<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [ // AQUI VAN LOS CAMPOS DE LA TABLA
        'body', 
        'userID', 
        'partyId', //HAY ESTA COMA? en USER SI QUE ESTA
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User','userID','Id');
    }
    public function party()
    {
        return $this->belongsTo('App\Models\Party','partyID','Id');
    }
}
