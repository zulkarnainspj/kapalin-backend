<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\Route;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ship;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    public function index()
    {
        $ships = Schedule::select('ship_id')->groupBy('ship_id')->get();

        return view('employee.schedules.index', [
            'title' => 'Jadwal',
            'nvb' => 'schedules',
            'ships' => $ships
        ]);
    }

    public function schedule($id)
    {
        $ship = Ship::find($id);
        $schedules = Schedule::where('ship_id', $id)->orderBy('etd', 'desc')->get();

        return view('employee.schedules.schedules', [
            'title' => 'Jadwal',
            'nvb' => 'schedules',
            'schedules' => $schedules,
            'ship' => $ship
        ]);
    }

    public function passenger($ship_id, $schedule_id)
    {
        $ship = Ship::find($ship_id);
        $schedule = Schedule::find($schedule_id);
        $ticket = Ticket::where('schedule_id', $schedule_id)->orderBy('created_at', 'desc')->get();
        $route = Schedule::select('route_id', 'name')
            ->join('routes', 'routes.id', '=', 'schedules.route_id')
            ->join('ports', 'ports.id', '=', 'routes.port_id')
            ->where('schedules.id', $schedule_id)
            ->first();

        $next_route = Schedule::select('route_id', 'name')
            ->join('routes', 'routes.id', '=', 'schedules.route_id')
            ->join('ports', 'ports.id', '=', 'routes.next_port_id')
            ->where('schedules.id', $schedule_id)
            ->first();


        return view('employee.schedules.passengers', [
            'title' => 'Penumpang',
            'nvb' => 'schedules',
            'ticket' => $ticket,
            'schedule' => $schedule,
            'ship' => $ship,
            'route' => $route,
            'next_route' => $next_route
        ]);
    }

    public function disable($id)
    {
        $schedule = Schedule::find($id);
        $schedule->status = 0;
        $schedule->save();

        Alert::success('Sukses', 'Penjualan tiket pada jadwal ini di nonaktifkan');

        return redirect('/employee/schedules/' . $schedule->ship_id);
    }

    public function enable($id)
    {
        $schedule = Schedule::find($id);
        $schedule->status = 1;
        $schedule->save();

        Alert::success('Sukses', 'Penjualan tiket pada jadwal ini di aktifkan');

        return redirect('/employee/schedules/' . $schedule->ship_id);
    }
}
