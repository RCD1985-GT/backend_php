<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Game;

class GameController extends Controller
{
    // FUNCION QUE AÑADE JUEGO....OK
    public function addGame(Request $request) {

        $title = $request->input('title');
        $url = $request->input('url');

        try {

            Game::create([

                    'title' => $title,
                    'url' => $url

                ]);

        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }

    // FUNCION QUE MUESTRA LOS JUEGOS...OK
    public function showAllGames() {

        try {
            
            return Game::all();

        } 
        
        catch(QueryException $error) {

            return $error;

        }

    }

    // FUNCION QUE ACTUALIZA JUEGO.....NO
    public function updateGame(Request $request, $id)
     
    {

        $game = Game::find($id);

        $id = $request->input('id');

        $this->validate($request, [

            'id' => 'required',
            'title' => 'required|string|min:1',
            'url' => 'required|string|min:5'

        ], [

            'title' => 'title is required',
            'url' => 'url is required',

        ]);

    
        try {

            $validatedUpdate = [

                'title' => $request->title,
                'url' => $request->url

            ];

            return Game::where('id', '=', $id)->update($validatedUpdate);

        } 
        
        catch (QueryException $error) {

            return $error;

        }

    }
    
    // FUNCION QUE BORRA JUEGO...OK
    public function deleteGame(Request $request, $id) {

        $game = Game::find($id);
        $game->delete();

        return response()->json(

            $game

        );

    }
}
