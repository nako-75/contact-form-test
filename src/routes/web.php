<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/admin/search', [AdminController::class, 'search']);
Route::get('/reset', [AdminController::class, 'reset']);
Route::get('/admin/export', [AdminController::class, 'export']);
Route::post('/admin/delete', [AdminController::class, 'destroy']);