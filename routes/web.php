<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
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

Route::get('/', [ComplaintController::class, 'index'])->middleware('auth');
Route::get('/create', [ComplaintController::class, 'create'])->middleware('auth');
Route::post('/store', [ComplaintController::class, 'store'])->middleware('auth');

Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [loginController::class, 'login'])->middleware('guest');
Route::post('/logout', [loginController::class, 'logout'])->middleware('auth');

Route::get('/register', [registerController::class, 'index']);
Route::post('/register', [registerController::class, 'store']);

Route::get('/responses', [ResponseController::class, 'index']);
Route::get('/response/create', [ResponseController::class, 'create']);

Route::get('/dashboard', [adminController::class, 'index']);
Route::get('/dashboard/process', [adminController::class, 'onProcess']);
Route::get('/dashboard/done', [adminController::class, 'done']);
