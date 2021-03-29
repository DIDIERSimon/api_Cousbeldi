<?php

use App\Http\Controllers\PlatController;
use App\Http\Controllers\AuthController;
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

Route::get('/{api_token}/{name}', function (Request $request) {
    return response()->json([
        'name' => $request->name,
    ]);
})->middleware('api_token');
//plats
Route::get('{api_token}/plats', [PlatController::class, 'index'])->middleware('api_token');
Route::get('{api_token}{api_token}plats/{id}', [PlatController::class, 'show'])->middleware('api_token');
Route::post('{api_token}/plats', [PlatController::class, 'store'])->middleware('api_token');
Route::put('{api_token}/plats/{id}', [PlatController::class, 'update'])->middleware('api_token');
Route::delete('{api_token}/plats/{id}', [PlatController::class, 'delete'])->middleware('api_token');


//Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);