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

        $game->title = $request->title;
        $game->url = $request->url;      
        
        $game->save();
        return response()->json($game); 

    }
    
    // FUNCION QUE BORRA JUEGO...OK
    public function deleteGame(Request $request, $id) 
    
    {

        $game = Game::find($id);
        $game->delete();

        return response()->json(

            $game

        );

    }
}
