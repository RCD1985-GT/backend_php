<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Party;
use App\Models\User;

class PartyController extends Controller
{

    // FUNCION QUE MUESTRA PARTIDAS...OK
    public function showAllParty()
    {

        try {

            return Party::all();
        } catch (QueryException $error) {
            return $error;
        }
    }

    // FUNCION QUE AÑADE PARTIDA....OK
    public function addParty(Request $request)
    {

        $name = $request->input('name');
        $game = $request->input('game_id');
        

        try {

            return Party::create([

                'name' => $name,
                'game_id' => $game,
                

            ]);
        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
        }
    }

    // FUNCION QUE BORRA PARTIDA....NO
    public function deleteParty(Request $request)
    {

        $userId = User::id();
        $partyId = $request->input('game_id');

        try { // VERIFICA QE USUARIO ES CREADOR PARA PODER ELIMINAR LA PARTIDA

            return Party::where('owner', '=', $userId)->where('id', '=', $partyId)->delete($partyId);

        } catch (QueryException $error) {

            $errorCode = $error->errorInfo[1];

            return response()->json([

                'error' => $errorCode

            ]);
        }
    }
}
