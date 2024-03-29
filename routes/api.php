<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\UserController;
use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'index']);

    Route::apiResources([
        'avatar'    => AvatarController::class
    ]);
});

Route::post('/login', [UserController::class, 'login']);
