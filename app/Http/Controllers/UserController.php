<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;


use App\Models\User;

class UserController extends Controller
{
    // FUNCION QUE MUESTRA TODOS LOS USUARIOS....OK
    public function showAllUsers(){

        try {
            
            return User::all();

        } catch(QueryException $error) {
            return $error;
        }
    }

    // FUNCION QUE MUESTRA EL PERFIL DEL USUARIO....OK
    public function showProfile(Request $request){

        $id = $request->input('id');

        try {

            return User::all()->where('id', '=', $id)
            ->makeHidden(['password'])->keyBy('id');

        } catch (QueryException $error) {
            return $error;
        }
    }
    
    // FUNCION QUE REGISTRA UN USUARIO....OK
    public function registerUser(Request $request){

        $email = $request->input('email');
        $name = $request->input('name');
        $password =bcrypt($request->input('password'));

       
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
    
    // FUNCION QUE ACTUALIZA UN USUARIO....OK
    public function updateProfile(Request $request, $id){
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json($user); 


    }

    // FUNCION QUE BORRA UN USUARIO.....OK
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
    


    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                $token = JWTAuth::fromUser($user);
                return response()->json(compact('user', 'token'), 200);
            } else {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    

     // FUNCION LOGOUT...OK
    public function logout(Request $request)
    {
        
        try {
            
            JWTAuth::invalidate($request->bearerToken());
            return response()->json('User logged out successfully', 200);
        } catch (JWTException $exception) {
            return response()->json(
                [
                    'error' => 'Sorry, the user cannot be logged out',
                    'description' => $exception
                ],
                500
            );
        }
    }



}
