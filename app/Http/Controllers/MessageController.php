<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Message;
use App\Models\User;


class MessageController extends Controller
{

    // FUNCION QUE ENSEÑA TODOS LOS MENSAJES
    public function showAllMessages() {

        try {
            
            return Message::all();

        } 
        
        catch(QueryException $error) {

            return $error;

        }

    }

        // FUNCION QUE AÑADE UN MENSAJE
    public function añadirMessage(Request $request) {

        $user = $request->input('userId');
        $message = $request->input('body');

        try {

            return Message::create([

                'userID' => $user,
                'body' => $message,
                

            ]);

        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }

     // FUNCION QUE ACTUALIZA UN MENSAJE
    public function updateMessages(Request $request) {

        $user = User::id();
        $messageId = $request->input('messageId');

        try { 
            
            $msg = ['message'=>$request->message];
            return Message::where('id', '=', $messageId)->update($msg);

        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }

     // FUNCION QUE BORRA UN MENSAJE
    public function deleteMessage(Request $request) {

        $user = User::id();
        $messageId = $request->input('messageId');

        try {

            return Message::where('id', '=', $messageId)->delete($messageId);

        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }
}
