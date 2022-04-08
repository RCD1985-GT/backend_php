<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


use App\Models\User;

class UserController extends Controller
{
    // FUNCION QUE MUESTRA TODOS LOS USUARIOS
    public function showAllUsers(){

        try {
            
            return User::all();

        } catch(QueryException $error) {
            return $error;
        }
    }

    // FUNCION QUE MUESTRA EL PERFIL DEL USUARIO
    public function showProfile(Request $request){

        $id = $request->input('id');

        try {

            return User::all()->where('id', '=', $id)
            ->makeHidden(['password'])->keyBy('id');

        } catch (QueryException $error) {
            return $error;
        }
    }
    
    // FUNCION QUE REGISTRA UN USUARIO
    public function registerUser(Request $request){

        $email = $request->input('email');
        $name = $request->input('name');
        $password = $request->input('password');

        $this -> validate( $request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        try {
            
            return User::create(
                [
                    'email' => $email,
                    'name' => $name,
                    'password' => $password
                ]
                );
        
        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            if($codigoError == 1062) {
                return response()->json([
                    'error' => "E-mail ya registrado anteriormente"
                ]);
            }

        }

    }
    
    // FUNCION QUE ACTUALIZA UN USUARIO
    public function updateProfile(Request $request){
        
        $id = $request->input('id');
        $email = $request->input('email');
        $name = $request->input('name');
       
    }

    // FUNCION QUE BORRA UN USUARIO
    public function deleteUser(Request $request){

        $id = $request->input('id');

        try {
            
            $arrayUser = USER::all()
            ->where('id', '=', $id);

            $USER = USER::where('id', '=', $id);
            
            if (count($arrayUser) == 0) {
                return response()->json([
                    "data" => $arrayUser,
                    "message" => "No se ha encontrado el USER"
                ]);
            }else{
                $USER->delete();
                return response()->json([
                    "data" => $arrayUser,
                    "message" => "USER borrado correctamente"
                ]);
            }

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }
    
}
