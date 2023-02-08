<?php

use App\Http\Controllers\API\Admin\Auth\LogoutController;
use App\Http\Controllers\API\Admin\Data\KapalController;
use App\Http\Controllers\API\Auth\CheckController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\ShipListController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Customer\AccountController;
use App\Http\Controllers\API\Customer\OrderController;
use App\Http\Controllers\API\Customer\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

date_default_timezone_set('Asia/Jakarta');

Route::post('/admin/login', LoginController::class)->name('login');
Route::post('/admin/logout', LogoutController::class);
Route::get('/admin/kapal', [KapalController::class, 'index'])->middleware('jwt.verify');
Route::post('/admin/kapal/store', [KapalController::class, 'store'])->middleware('jwt.verify');

Route::get('/ship', [ShipListController::class, 'index']);
Route::get('/ship/{id}', [ShipListController::class, 'schedule_list']);

Route::post('/login', LoginController::class)->name('login');
Route::post('/register', RegisterController::class);
Route::get('/check', [CheckController::class, 'check'])->middleware('jwt.verify');
Route::post('/order', [OrderController::class, 'index']);

Route::get('/account/{id}', [AccountController::class, 'index'])->middleware('jwt.verify');
Route::get('/transaction/{email}', [TransactionController::class, 'index'])->middleware('jwt.verify');