<?php

namespace App\Http\Controllers;
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

Route::get('/', [LoginController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/req', [LoginController::class, 'login']);

Route::get('/admin', [Admin\HomeController::class, 'index'])->middleware('auth');

Route::get('/admin/ships', [Admin\ShipController::class, 'index'])->middleware('auth');
Route::get('/admin/ships/add', [Admin\ShipController::class, 'create'])->middleware('auth');
Route::post('/admin/ships/store', [Admin\ShipController::class, 'store'])->middleware('auth');
