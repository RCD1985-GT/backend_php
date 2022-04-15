<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Message;
use App\Models\User;


class MessageController extends Controller
{

    // FUNCION QUE ENSEÑA TODOS LOS MENSAJES...OK
    public function showAllMessages()
    {

        try {

            return Message::all();
        } catch (QueryException $error) {

            return $error;
        }
    }


    // FUNCION QUE AÑADE UN MENSAJE...OK
    public function addMessage(Request $request)
    {

        $user = $request->input('user_id');
        $message = $request->input('body');

        try {

            return Message::create([

                'user_id' => $user,
                'body' => $message,
                

            ]);
        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
        }
    }

    // FUNCION QUE ACTUALIZA UN MENSAJE...NO
    public function updateMessages(Request $request)
    {

            
        $user = User::id(); // USER AQUI ESTA APAGADO
        $messageId = $request->input('messageId'); // YO NO TENGO 'MESSAGEID'

        try {

            $msg = ['message' => $request->message];
            return Message::where('id', '=', $messageId)->update($msg);
        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
        }
    }

    // FUNCION QUE BORRA UN MENSAJE....NO
    public function deleteMessage(Request $request)
    {

        $user = User::id();// USER AQUI ESTA APAGADO
        $messageId = $request->input('messageId');// YO NO TENGO 'MESSAGEID'

        try {

            return Message::where('id', '=', $messageId)->delete($messageId);
        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
        }
    }
}
