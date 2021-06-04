<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});




Route::group(['middleware' => ['auth']], function () {
    //avatar profile
route::get('profile',[UserController::class,'index'])->name('profile');
route::post('profile',[UserController::class,'store'])->name('profile.store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//exportar excel
Route::get('/clientes/exportExcel',[ClientsController::class,'exportExcel'])->name('clientes.exportExcel');

//importar excel
Route::get('/clientes/importForm',[ClientsController::class,'importForm'])->name('clientes.importForm');
Route::post('/import',[ClientsController::class,'import'])->name('clientes.import');


Route::apiResource('/ciudades',CityController::class)->parameters(['ciudades' => 'ciudad']);
Route::apiResource('/clientes',ClientsController::class)->parameters(['clientes' => 'cliente']);
});


Auth::routes();




