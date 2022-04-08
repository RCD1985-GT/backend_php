<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Party;
use App\Models\User;

class PartyController extends Controller
{

    // FUNCION QUE MUESTRA LAS PARTIDAS
    public function showAllParty()
    {

        try {

            return Party::all();
        } catch (QueryException $error) {
            return $error;
        }
    }


    // FUNCION QUE AÑADE PARTIDA
    public function addParty(Request $request)
    {

        $name = $request->input('name');
        $game = $request->input('gameId');

        try {

            return Party::create([

                'name' => $name,
                'gameId' => $game

            ]);
        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([ 

                'error' => $codigoError

            ]);
        }
    }

    // FUNCION QUE BORRA UNA PARTIDA
    public function deleteParty(Request $request)
    {

        $userId = User::id();
        $partyId = $request->input('partyId');

        try {

            return Party::where('owner', '=', $userId)->where('id', '=', $partyId)->delete($partyId);
        } catch (QueryException $error) {

            $errorCode = $error->errorInfo[1];

            return response()->json([

                'error' => $errorCode

            ]);
        }
    }
}
