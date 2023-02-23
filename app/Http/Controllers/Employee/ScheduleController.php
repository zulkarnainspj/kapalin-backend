<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\Route;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ship;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Exception;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        $schedule = Schedule::find($id);
        $schedule->status = 0;
        $schedule->save();

        $ticket = Ticket::where('schedule_id', $id)->update(['pending' => 1]);

        DB::commit();

        Alert::success('Sukses', 'Penjualan tiket pada jadwal ini di nonaktifkan');

        return redirect('/employee/schedules/' . $schedule->ship_id);
    }

    public function enable($id)
    {
        DB::beginTransaction();
        $schedule = Schedule::find($id);
        $schedule->status = 1;
        $schedule->save();

        $ticket = Ticket::where('schedule_id', $id)->update(['pending' => 0]);
        DB::commit();

        Alert::success('Sukses', 'Penjualan tiket pada jadwal ini di aktifkan');

        return redirect('/employee/schedules/' . $schedule->ship_id);
    }

    public function report($id)
    {
        $schedule = Schedule::find($id);

        $ticket = Ticket::select('no_id', 'name', 'gender', 'date_of_birth')
            ->join('passengers', 'passengers.id', '=', 'tickets.passenger_id')
            ->where('schedule_id', $id)
            ->where('status', 3)
            ->orderBy('name', 'asc')
            ->get();

        $route = Schedule::select('route_id', 'p.name as port', 'np.name as next_port')
            ->join('routes', 'routes.id', '=', 'schedules.route_id')
            ->join('ports as p', 'p.id', '=', 'routes.port_id')
            ->join('ports as np', 'np.id', '=', 'routes.next_port_id')
            ->where('schedules.id', $id)
            ->first();

        try {
            $pdf = FacadePdf::loadView('employee.schedules.report', [
                'schedule' => $schedule,
                'ticket' => $ticket,
                'route' => $route,
            ]);

            return $pdf->stream();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function passenger_count(Request $request)
    {
        $schedule = Schedule::findOrFail($request->schedule_id);
        $schedule->passengers = $request->jumlah_penumpang;
        $schedule->save();

        Alert::success('Sukses', 'Jumlah penumpang behasil diperbarui');

        return redirect('/employee/schedules/' . $schedule->ship_id);
    }
}
