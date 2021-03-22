<?php

use App\Http\Controllers\PlatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {   return $request->user();    });
//plats
Route::get('plats', [PlatController::class, 'index']);
Route::get('plats/{id}', [PlatController::class, 'show']);
Route::post('plats', [PlatController::class, 'store']);
Route::put('plats/{id}', [PlatController::class, 'update']);
Route::delete('plats/{id}', [PlatController::class, 'delete']);

//Details
Route::get('details', [DetailController::class, 'index']);
Route::get('details/{id}', [DetailController::class, 'show']);
Route::post('details', [DetailController::class, 'store']);
Route::put('details/{id}', [DetailController::class, 'update']);
Route::delete('details/{id}', [DetailController::class, 'delete']);

//Authentification
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);