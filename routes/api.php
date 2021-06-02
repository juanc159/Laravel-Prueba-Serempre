<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\CityApiController;
use App\Http\Controllers\API\ClientApiController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//RUTAS PUBLICAS
Route::post('/register', [AuthApiController::class,'register']);
Route::post('/login', [AuthApiController::class,'login']);

//RUTAS PRIVADAS
//rutas protegidas
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout',[AuthApiController::class,'logout']);
    Route::get('/clients',[ClientApiController::class,'index']);
    Route::get('/cities',[CityApiController::class,'index']);
});
