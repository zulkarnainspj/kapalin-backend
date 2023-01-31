<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ship;
use Illuminate\Http\Request;

class ShipListController extends Controller
{
    public function index()
    {
        $date = date_create()->format('Y-m-d') . ' 00:00:00';
        $last_date = date('Y-m-d' . ' 23:59:59', strtotime($date . ' + 1 years'));

        $ships = Schedule::select('name', 'ships.id', 'status')
            ->join('ships', 'ships.id', '=', 'schedules.ship_id')
            ->whereBetween('etd', [$date, $last_date])
            ->where('status', 1)
            ->distinct()
            ->get();

        return response()->json([
            'success' => true,
            'ships' => $ships,
        ], 200);
    }

    public function schedule_list($id)
    {
        $ship = Ship::findOrFail($id);
        $schedule = $ship->schedule_active();
        $route = [];
        $next_route = [];

        $no = 0;
        foreach ($schedule as $schd) {
            $route[$no] = $schd->route->port;
            $next_route[$no] = $schd->route->next_port;
            $no++;
        }

        return response()->json([
            'success' => true,
            'ship' => $ship,
            'schedule' => $schedule
        ], 200);
    }
}
