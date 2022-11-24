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
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

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

Route::get('/admin/routes', [Admin\RouteController::class, 'index'])->middleware('auth');
Route::get('/admin/routes/add', [Admin\RouteController::class, 'create'])->middleware('auth');
Route::post('/admin/routes/store', [Admin\RouteController::class, 'store'])->middleware('auth');
Route::get('/admin/routes/edit/{id}', [Admin\RouteController::class, 'edit'])->middleware('auth');
Route::post('/admin/routes/update', [Admin\RouteController::class, 'update'])->middleware('auth');
Route::get('/admin/routes/remove/{id}', [Admin\RouteController::class, 'destroy'])->middleware('auth');

Route::get('/admin/users', [Admin\UserController::class, 'index'])->middleware('auth');
Route::get('/admin/users/add', [Admin\UserController::class, 'create'])->middleware('auth');
Route::post('/admin/users/store', [Admin\UserController::class, 'store'])->middleware('auth');
Route::get('/admin/users/edit/{id}', [Admin\UserController::class, 'edit'])->middleware('auth');
Route::post('/admin/users/update', [Admin\UserController::class, 'update'])->middleware('auth');
Route::get('/admin/users/remove/{id}', [Admin\UserController::class, 'destroy'])->middleware('auth');

Route::get('/admin/schedules', [Admin\ScheduleController::class, 'index'])->middleware('auth');
Route::get('/admin/schedules/add', [Admin\ScheduleController::class, 'create'])-> middleware('auth');
Route::get('/admin/schedules/add/{id}', [Admin\ScheduleController::class, 'create2'])->middleware('auth');
Route::post('/admin/schedules/store', [Admin\ScheduleController::class, 'store'])->middleware('auth');
Route::get('/admin/schedules/{id}', [Admin\ScheduleController::class, 'schedule'])->middleware('auth');
Route::post('/admin/schedules/ships/store', [Admin\ScheduleController::class, 'store2'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Petugas
|--------------------------------------------------------------------------
*/

Route::get('/employee', [Employee\HomeController::class, 'index'])->middleware('auth');

Route::get('/employee/schedules', [Employee\ScheduleController::class, 'index'])->middleware('auth');
Route::get('/employee/schedules/{id}', [Employee\ScheduleController::class, 'schedule'])->middleware('auth');
Route::get('/employee/tickets', [Employee\TicketController::class, 'index'])->middleware('auth');

Route::get('/employee/tickets/route/{ship_id}', [Employee\TicketController::class, 'route'])->middleware('auth');
Route::get('/employee/tickets/schedule/{ship_id}/{route_id}', [Employee\TicketController::class, 'schedule'])->middleware('auth');
Route::get('/employee/tickets/price/{schedule_id}', [Employee\TicketController::class, 'price'])->middleware('auth');

Route::post('/employee/order', [Employee\TicketController::class, 'order'])->middleware('auth');
