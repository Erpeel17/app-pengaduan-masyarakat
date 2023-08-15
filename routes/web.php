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

Route::get('/register', [registerController::class, 'index'])->middleware('guest');
Route::post('/register', [registerController::class, 'store'])->middleware('guest');

Route::get('/responses', [ResponseController::class, 'index'])->middleware('auth');
Route::get('/response/create', [ResponseController::class, 'create'])->middleware('auth');

Route::get('/dashboard', [adminController::class, 'index'])->middleware('auth')->middleware('admin');

Route::get('/dashboard/response/{complaint}', [ResponseController::class, 'create'])->middleware('auth')->middleware('admin');
Route::post('/dashboard/response', [ResponseController::class, 'store'])->middleware('auth')->middleware('admin');
Route::get('/dashboard/process', [ResponseController::class, 'onProcess'])->middleware('auth')->middleware('admin');
Route::get('/dashboard/done', [ResponseController::class, 'done'])->middleware('auth')->middleware('admin');
