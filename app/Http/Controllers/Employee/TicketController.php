<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\Route;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ship;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $ships = Ship::orderBy('name')->get();
        
        return view('employee.tickets.index', [
            'title' => 'Tiket',
            'nvb' => 'tickets',
            'ships' => $ships
        ]);
    }

    public function route($id)
    {
        // SELECT ports.name FROM schedules, routes, ports WHERE schedules.route_id = routes.id AND routes.next_port_id = ports.id
        $route = Schedule::select('route_id', 'name')
        ->join('routes', 'routes.id', '=', 'schedules.route_id')
        ->join('ports', 'ports.id', '=', 'routes.next_port_id')
        ->where('ship_id', $id)
        ->get();

        return response()->json($route);
    }

    public function schedule($ship_id, $route_id)
    {
        $schedule = Schedule::select('id', 'etd')->orderBy('eta', 'desc')->where('ship_id', $ship_id)->where('route_id', $route_id)->get();

        return response()->json($schedule);
    }
}
