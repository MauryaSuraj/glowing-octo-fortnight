<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;

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

// Unauthenticated routes

// Route::post('/tokens/create', function (Request $request) {
//     $user = User::find(2);
//     $token = $user->createToken($request->token_name);
//     return ['token' => $token->plainTextToken];
// });

Route::get('get_all_users', [UserController::class, 'get_all_users']);

Route::middleware(['decodeRequest', 'encodeResponse'])->group(function(){

Route::post('/create-user', [UserController::class, 'create_user']);

// All authenticated routes.
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/posts', [PostController::class, 'all_posts']);
});

});








