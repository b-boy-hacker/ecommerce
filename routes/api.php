<?php

use App\Http\Controllers\API\AlumnoController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login',[AuthController::class,'login']);
Route::post('getTareasToAlumnos',[AlumnoController::class,'getTareasToAlumno']);

Route::post('getAlumnosToPadre',[AlumnoController::class,'getAlumnosToPadre']);



/* Route::prefix('company')->group(function(){
    Route::get('/index',[CompanyController::class, 'index'] );
    Route::post('/create',[CompanyController::class, 'store'] );
    Route::get('/show/{id}',[CompanyController::class, 'show'] );
    Route::get('index',[CompanyController::class, 'index'] );
    Route::get('index',[CompanyController::class, 'index'] );
    
}); */