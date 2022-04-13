<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Game;

class GameController extends Controller
{
    // FUNCION QUE AÑADE JUEGO....OK
    public function addGame(Request $request) {

        $name = $request->input('name');
        $url = $request->input('url');

        try {

            Game::create([

                    'name' => $name,
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
    public function updateGame(Request $request) {

        $id = $request->input('id');

        $this->validate($request, [

            'id' => 'required',
            'name' => 'required|string|min:1',
            'url' => 'required|string|min:5'

        ], [

            'name' => 'title is required',
            'url' => 'url is required',

        ]);

    
        try {

            $validatedUpdate = [

                'name' => $request->title,
                'url' => $request->url

            ];

            return Game::where('id', '=', $id)->update($validatedUpdate);

        } 
        
        catch (QueryException $error) {

            return $error;

        }

    }
    
    // FUNCION QUE BORRA JUEGO...OK
    public function deleteGame(Request $request) {

        $id = $request->input('id');

        try {

            return Game::where('id', '=', $id)->delete($id);

        } 
        
        catch (QueryException $error) {

            return $error;

        }

    }
}
