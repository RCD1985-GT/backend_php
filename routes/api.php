<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/', function () {
//     return view('welcome');
//     return ["nombre"=>"Paco"];
//     });

//Endpoints USER
Route::post('register', [UserController::class, 'registerUser']);
Route::get('allusers', [UserController::class, 'showAllUsers']);
Route::post('profile', [UserController::class, 'showProfile']);
Route::put('update', [UserController::class, 'updateProfile']);
Route::delete('delete', [UserController::class, 'deleteUser']);

//Endpoints MESSAGE

Route::post('addmessage', [MessageController::class, 'addMessage']);
Route::get('allmessages', [MessageController::class, 'showAllMessages']);
Route::put('updatemessage', [MessageController::class, 'updateMessages']);
Route::delete('deletemessage', [MessageController::class, 'deleteMessage']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
