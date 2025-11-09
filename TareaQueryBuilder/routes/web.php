<?php

use App\Http\Controllers\ConsultaController;
use Illuminate\Support\Facades\Route;

Route::get('/qb1', [ConsultaController::class, 'qb1']);
Route::get('/qb2', [ConsultaController::class, 'qb2']);
Route::get('/qb3', [ConsultaController::class, 'qb3']);
Route::get('/qb4', [ConsultaController::class, 'qb4']);
Route::get('/qb5', [ConsultaController::class, 'qb5']);
Route::get('/qb6', [ConsultaController::class, 'qb6']);
Route::get('/qb7', [ConsultaController::class, 'qb7']);
Route::get('/qb8', [ConsultaController::class, 'qb8']);
Route::get('/qb9', [ConsultaController::class, 'qb9']);
Route::get('/qb10', [ConsultaController::class, 'qb10']);
//Route::get('/qb11', [ConsultaController::class, 'qb11']);
//Route::get('/qb12', [ConsultaController::class, 'qb12']);

Route::get('/', function () {
    return view('welcome');
});
