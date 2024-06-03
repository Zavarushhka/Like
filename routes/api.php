<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/like', [LikeController::class, 'store']); // Метод store сохраняет лайк
Route::post('/unlike', [LikeController::class, 'destroy']); // Метод destroy удаляет лайк
Route::get('/user/{id_user}/likes', [LikeController::class, 'getUserLikes']);
Route::get('/music/{id_music}/likes', [LikeController::class, 'getMusicLikes']);
