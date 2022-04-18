
Este proyecto consiste en un backend realizado con Php y Laravel para una aplicación web LFG que
permite que los empleados puedan contactar con otros compañeros para
formar grupos para jugar a un videojuego, con el objetivo de poder compartir
un rato de ocio afterwork.


Instalación:
- Clonar repositorio : git clone https://github.com/RCD1985-GT/backend_php.git
- Instalar dependencias: composer install
- Crear la base de datos en MySql Workbench
- Configurar las variables de entorno en archivo .env para conectar con Heroku
- Hacer migraciones: php artisan migrate


¿Qué se puede hacer en la app?

🚩 Endpoints

Users 👥
Route::post('register', [UserController::class, 'registerUser']);
Route::post('login', [UserController::class, 'login']);
Route::get('allusers', [UserController::class, 'showAllUsers']);
Route::post('profile', [UserController::class, 'showProfile']);
Route::put('update/{id}', [UserController::class, 'updateProfile']);
Route::delete('delete', [UserController::class, 'deleteUser']);

Games 🎮
Route::post('addgame', [GameController::class, 'addGame']);
Route::get('allgames', [GameController::class, 'showAllGames']);
Route::put('updategame/{id}', [GameController::class, 'updateGame']);
Route::delete('deletegame/{id}', [GameController::class, 'deleteGame']);

Parties 🎉
Route::post('addparty', [PartyController::class, 'addParty']);
Route::get('partybygame/{id}', [PartyController::class, 'partyByGameId']);
Route::get('allpartys', [PartyController::class, 'showAllParty']);
Route::delete('deleteparty/{id}', [PartyController::class, 'deleteParty']);

Messages 💬
Route::post('addmessage', [MessageController::class, 'addMessage']);
Route::get('allmessages', [MessageController::class, 'showAllMessages']);
Route::put('updatemessage/{id}', [MessageController::class, 'updateMessage']);
Route::delete('deletemessage/{id}', [MessageController::class, 'deleteMessage']);

Members 👥
Route::get('/members', [MemberController::class, 'allMembers']);
Route::post('/members', [MemberController::class, 'newMember']);
Route::delete('/members/{id}', [MemberController::class, 'deleteMember']);

POSTMAN
Falta captura de pantalla


HEROKU
completar conexion