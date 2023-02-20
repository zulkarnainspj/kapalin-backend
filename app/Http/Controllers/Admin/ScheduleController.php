<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Route;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        $schedule->price = $request->price;
        $schedule->save();

        Alert::success('Sukses', 'Jadwal berhasil ditambahkan');

        return redirect('/admin/schedules');
    }

    public function create2($id)
    {
        $ship = Ship::find($id);
        $routes = Route::get();
        return view('admin.schedules.create2', [
            'title' => 'Jadwal',
            'nvb' => 'schedules',
            'ship' => $ship,
            'routes' => $routes
        ]);
    }

    public function store2(Request $request)
    {
        $schedule = new Schedule;
        $schedule->ship_id = $request->ship;
        $schedule->route_id = $request->route;
        $schedule->eta = $request->eta_date . ' ' . $request->eta_time;
        $schedule->etd = $request->etd_date . ' ' . $request->etd_time;
        $schedule->price = $request->price;
        $schedule->save();

        Alert::success('Sukses', 'Jadwal berhasil ditambahkan');

        return redirect('/admin/schedules/' . $schedule->ship_id);
    }

    public function schedule($id)
    {
        $ship = Ship::find($id);
        $schedules = Schedule::where('ship_id', $id)->orderBy('etd', 'desc')->get();

        return view('admin.schedules.schedules', [
            'title' => 'Jadwal',
            'nvb' => 'schedules',
            'schedules' => $schedules,
            'ship' => $ship
        ]);
    }

    public function edit($ship_id, $schedule_id)
    {
        $schedule = Schedule::findOrFail($schedule_id);
        $ship = Ship::findOrFail($ship_id);
        $routes = Route::get();

        
        return view('admin.schedules.edit', [
            'title' => 'Edit Jadwal',
            'nvb' => 'schedules',
            'schedule' => $schedule,
            'ship' => $ship,
            'routes' => $routes
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $schedule = Schedule::find($request->schedule_id);
        $schedule->route_id = $request->route;
        $schedule->eta = $request->eta_date . ' ' . $request->eta_time;
        $schedule->etd = $request->etd_date . ' ' . $request->etd_time;
        $schedule->price = $request->price;
        $schedule->save();
        DB::commit();

        Alert::success('Sukses', 'Jadwal berhasil diperbarui');

        return redirect('/admin/schedules/' . $request->ship_id . '/edit/' . $request->schedule_id);
    }

    public function disable($id)
    {
        $schedule = Schedule::find($id);
        $schedule->status = 0;
        $schedule->save();

        Alert::success('Sukses', 'Penjualan tiket pada jadwal ini di nonaktifkan');

        return redirect('/admin/schedules/' . $schedule->ship_id);
    }

    public function enable($id)
    {
        $schedule = Schedule::find($id);
        $schedule->status = 1;
        $schedule->save();

        Alert::success('Sukses', 'Penjualan tiket pada jadwal ini di aktifkan');

        return redirect('/admin/schedules/' . $schedule->ship_id);
    }

    public function destroy($ship_id, $schedule_id)   
    {
        $schedule = Schedule::find($schedule_id);
        $schedule->delete();

        Alert::success('Sukses', 'Jadwal berhasil dihapus');

        return redirect('/admin/schedules/' . $ship_id);
    }
}
