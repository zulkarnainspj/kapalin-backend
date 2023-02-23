<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

date_default_timezone_set('Asia/Jakarta');

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
Route::get('/admin/ports/origin/{id}', [Admin\PortController::class, 'origin'])->middleware('auth');

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

Route::get('/admin/passengers', [Admin\PassengerController::class, 'index'])->middleware('auth');

Route::get('/admin/schedules', [Admin\ScheduleController::class, 'index'])->middleware('auth');
Route::get('/admin/schedules/add', [Admin\ScheduleController::class, 'create'])-> middleware('auth');
Route::get('/admin/schedules/add/{id}', [Admin\ScheduleController::class, 'create2'])->middleware('auth');
Route::post('/admin/schedules/store', [Admin\ScheduleController::class, 'store'])->middleware('auth');
Route::get('/admin/schedules/{id}', [Admin\ScheduleController::class, 'schedule'])->middleware('auth');
Route::post('/admin/schedules/ships/store', [Admin\ScheduleController::class, 'store2'])->middleware('auth');
Route::get('/admin/schedules/enable/{id}', [Admin\ScheduleController::class, 'enable'])->middleware('auth');
Route::get('/admin/schedules/disable/{id}', [Admin\ScheduleController::class, 'disable'])->middleware('auth');
Route::get('/admin/schedules/{ship_id}/edit/{schedule_id}', [Admin\ScheduleController::class, 'edit'])->middleware('auth');
Route::get('/admin/schedules/{ship_id}/remove/{schedule_id}', [Admin\ScheduleController::class, 'destroy'])->middleware('auth');
Route::post('/admin/schedules/ships/update', [Admin\ScheduleController::class, 'update'])->middleware('auth');



/*
|--------------------------------------------------------------------------
| Petugas
|--------------------------------------------------------------------------
*/

Route::get('/employee', [Employee\HomeController::class, 'index'])->middleware('auth');

Route::get('/employee/schedules', [Employee\ScheduleController::class, 'index'])->middleware('auth');
Route::get('/employee/schedules/{id}', [Employee\ScheduleController::class, 'schedule'])->middleware('auth');
Route::get('/employee/schedules/enable/{id}', [Employee\ScheduleController::class, 'enable'])->middleware('auth');
Route::get('/employee/schedules/disable/{id}', [Employee\ScheduleController::class, 'disable'])->middleware('auth');
Route::get('/employee/report/{id}', [Employee\ScheduleController::class, 'report'])->middleware('auth');
Route::post('/employee/schedules/update/passenger/', [Employee\ScheduleController::class, 'passenger_count'])->middleware('auth')->name('update-passengers-count');
Route::get('/employee/schedules/{ship_id}/{schedule_id}', [Employee\ScheduleController::class, 'passenger'])->middleware('auth');

Route::get('/employee/tickets', [Employee\TicketController::class, 'index'])->middleware('auth');
Route::post('/employee/tickets/print', [Employee\TicketController::class, 'print'])->middleware('auth');
Route::get('/employee/tickets/manual/print/{tCdoe}', [Employee\TicketController::class, 'manual'])->middleware('auth');

Route::get('/employee/validation', [Employee\ValidationController::class, 'index'])->middleware('auth');

Route::get('/employee/tickets/route/{ship_id}', [Employee\TicketController::class, 'route'])->middleware('auth');
Route::get('/employee/tickets/schedule/{ship_id}/{route_id}', [Employee\TicketController::class, 'schedule'])->middleware('auth');
Route::get('/employee/tickets/price/{schedule_id}', [Employee\TicketController::class, 'price'])->middleware('auth');
Route::get('/employee/tickets/validate/{tCode}', [Employee\TicketController::class, 'check'])->middleware('auth');

Route::post('/employee/order', [Employee\TicketController::class, 'order'])->middleware('auth');



/*
|--------------------------------------------------------------------------
| Penumpang
|--------------------------------------------------------------------------
*/

Route::get('/cus/order/{j_penumpang}/{pemesan}/{schedule}', [Customer\OrderController::class, 'index']);
Route::post('/cus/submit', [Customer\OrderController::class, 'order']);
Route::get('/cus/get/{email}', [Customer\OrderController::class, 'get_user_data']);
Route::get('/cus/{t_code}', [Customer\OrderController::class, 'order_success']);
Route::get('/cus/{t_code}/download', [Customer\OrderController::class, 'ticket']);