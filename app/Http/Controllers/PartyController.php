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
    
    // FUNCION QUE MUESTRA PARTIDAS POR GAME_ID...OK
   
        public function partyByGameId($id)
        {
            $parties = Party::where('game_id', $id)->get();
            return response()->json($parties);
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

    // FUNCION QUE BORRA PARTIDA....OK
    public function deleteParty(Request $request, $id)
    {

        $party = Party::find($id);
        $party->delete();
       
       
            return response()->json(

                $party

            );
        }


    
}
