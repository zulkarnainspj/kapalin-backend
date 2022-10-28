<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Ship;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    public function index()
    {
        $ships = Schedule::select('ship_id')->groupBy('ship_id')->get();

        return view('admin.schedules.index', [
            'title' => 'Jadwal',
            'nvb' => 'schedules',
            'ships' => $ships
        ]);
    }

    public function create()
    {
        $ships = Ship::orderBy('name')->get();
        $routes = Route::get();

        return view('admin.schedules.create', [
            'title' => 'Jadwal',
            'nvb' => 'schedules',
            'ships' => $ships,
            'routes' => $routes
        ]);
    }

    public function store(Request $request)
    {
        $schedule = new Schedule;
        $schedule->ship_id = $request->ship;
        $schedule->route_id = $request->route;
        $schedule->eta = $request->eta_date . ' ' . $request->eta_time;
        $schedule->etd = $request->etd_date . ' ' . $request->etd_time;
        $schedule->save();

        Alert::success('Sukses', 'Jadwal berhasil ditambahkan');

        return redirect('/admin/schedules');
    }

    public function schedule($id)
    {
        $ship = Ship::find($id);
        $schedules = Schedule::where('ship_id', $id)->orderBy('eta')->get();

        return view('admin.schedules.schedules', [
            'title' => 'Jadwal',
            'nvb' => 'schedules',
            'schedules' => $schedules,
            'ship' => $ship
        ]);
    }
}
