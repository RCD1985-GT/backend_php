<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PartyController; 
use App\Http\Controllers\GameController;

//Endpoints USER
Route::post('register', [UserController::class, 'registerUser']);
Route::get('allusers', [UserController::class, 'showAllUsers']);
Route::post('profile', [UserController::class, 'showProfile']);
Route::put('update/{id}', [UserController::class, 'updateProfile']);
Route::delete('delete', [UserController::class, 'deleteUser']);

//Endpoints MESSAGE

Route::post('addmessage', [MessageController::class, 'addMessage']);
Route::get('allmessages', [MessageController::class, 'showAllMessages']);
Route::put('updatemessage/{id}', [MessageController::class, 'updateMessage']);
Route::delete('deletemessage/{id}', [MessageController::class, 'deleteMessage']);

//Endpoints PARTY

Route::post('addparty', [PartyController::class, 'addParty']);
Route::get('allpartys', [PartyController::class, 'showAllParty']);
Route::delete('deleteparty/{id}', [PartyController::class, 'deleteParty']);


//Endpoints GAME

Route::post('addgame', [GameController::class, 'addGame']);
Route::get('allgames', [GameController::class, 'showAllGames']);
Route::put('updategame/{id}', [GameController::class, 'updateGame']);
Route::delete('deletegame/{id}', [GameController::class, 'deleteGame']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
