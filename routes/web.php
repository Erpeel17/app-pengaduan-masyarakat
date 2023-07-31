<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ComplaintController::class, 'index']);
Route::get('/create', [ComplaintController::class, 'create']);

Route::get('/login', [loginController::class, 'index']);
Route::get('/register', [registerController::class, 'index']);

Route::get('/responses', [ResponseController::class, 'index']);
Route::get('/response/create', [ResponseController::class, 'create']);
