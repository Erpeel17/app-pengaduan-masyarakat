<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardComplaintController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\ResponseController;
use App\Models\Category;
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

Route::get('/dashboard', [DashboardComplaintController::class, 'index'])->middleware('auth')->middleware('admin');
Route::get('/dashboard/process', [DashboardComplaintController::class, 'onProcess'])->middleware('auth')->middleware('admin');
Route::get('/dashboard/done', [DashboardComplaintController::class, 'done'])->middleware('auth')->middleware('admin');

Route::get('/dashboard/response/{complaint}', [ResponseController::class, 'create'])->middleware('auth')->middleware('admin');
Route::post('/dashboard/response', [ResponseController::class, 'store'])->middleware('auth')->middleware('admin');

Route::get('/dashboard/officers', [adminController::class, 'index'])->middleware('auth')->middleware('admin');
Route::get('/dashboard/officers/create', [adminController::class, 'create'])->middleware('auth')->middleware('admin');
Route::post('/dashboard/officers/store', [adminController::class, 'store'])->middleware('auth')->middleware('admin');

Route::get('/dashboard/users', [adminController::class, 'users'])->middleware('auth')->middleware('admin');

Route::get('/dashboard/categories', [CategoryController::class, 'index'])->middleware('auth')->middleware('admin');
