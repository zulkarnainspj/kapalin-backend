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
Route::get('/admin/ships/edit/{id}', [Admin\ShipController::class, 'edit'])->middleware('auth');
Route::post('/admin/ships/update', [Admin\ShipController::class, 'update'])->middleware('auth');
Route::get('/admin/ships/remove/{id}', [Admin\ShipController::class, 'destroy'])->middleware('auth');

Route::get('/admin/ports', [Admin\PortController::class, 'index'])->middleware('auth');
Route::get('/admin/ports/add', [Admin\PortController::class, 'create'])->middleware('auth');
Route::post('/admin/ports/store', [Admin\PortController::class, 'store'])->middleware('auth');
Route::get('/admin/ports/edit/{id}', [Admin\PortController::class, 'edit'])->middleware('auth');
Route::post('/admin/ports/update', [Admin\PortController::class, 'update'])->middleware('auth');
Route::get('/admin/ports/remove/{id}', [Admin\PortController::class, 'destroy'])->middleware('auth');