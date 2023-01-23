<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\Route;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ship;
use App\Models\Admin\Ticket;
use App\Models\Employee\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Exception;

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

    public function order(Request $request)
    {
        $jumlahPenumpang = $request->jumlah_penumpang;

        DB::beginTransaction();
        $schedule = Schedule::find($request->schedule);

        for ($i = 0; $i < $jumlahPenumpang; $i++) {
            $request->validate([
                'ship' => ['required', 'numeric', 'not_in:0'],
                'route' => ['required', 'numeric', 'not_in:0'],
                'schedule' => ['required', 'numeric', 'not_in:0'],
                "no_id.$i" => ['numeric', 'nullable'],
                "name.$i" => ['required', 'min:3'],
                "date_of_birth.$i" => ['nullable'],
                "gender.$i" => ['numeric', 'required'],
            ]);

            $person = new Person;
            $person->no_id = $request->no_id[$i];
            $person->name = $request->name[$i];
            $person->date_of_birth = $request->date_of_birth[$i];
            $person->gender = $request->gender[$i];
            $person->save();

            $ticket = new Ticket;
            $ticket->user_id = auth()->user()->id;
            $ticket->person_id = $person->id;
            $ticket->schedule_id = $request->schedule;
            $ticket->ticket_code = $request->ticket_code;
            $ticket->price = ($schedule->price * $jumlahPenumpang);
            $ticket->status = 2;
            $ticket->save();
        }
        DB::commit();

        Alert::success('Sukses', 'Pembelian tiket berhasil');

        return redirect('/employee/tickets')->with('tCode', $request->ticket_code);
    }

    public function route($id)
    {
        $date = date_create();
        // SELECT ports.name FROM schedules, routes, ports WHERE schedules.route_id = routes.id AND routes.next_port_id = ports.id
        $route = Schedule::select('route_id', 'name')
            ->join('routes', 'routes.id', '=', 'schedules.route_id')
            ->join('ports', 'ports.id', '=', 'routes.next_port_id')
            ->where('ship_id', $id)
            ->where('etd', '>=', $date)
            ->distinct()
            ->get();

        return response()->json($route);
    }

    public function schedule($ship_id, $route_id)
    {
        $date = date_create();

        $schedule = Schedule::select('id', 'etd')
            ->orderBy('eta', 'desc')
            ->where('ship_id', $ship_id)
            ->where('route_id', $route_id)
            ->where('etd', '>=', $date)
            ->get();

        return response()->json($schedule);
    }

    public function price($schedule_id)
    {
        $schedule = Schedule::select('id', 'price')->where('id', $schedule_id)->first();

        return response()->json($schedule);
    }

    public function check($tCode)
    {
        DB::beginTransaction();
        $ticket = Ticket::select('users.name as uname', 'ports.name as pname', 'ships.name as sname', 'ticket_code', 'etd', 'tickets.price')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->join('schedules', 'schedules.id', '=', 'tickets.schedule_id')
            ->join('routes', 'routes.id', '=', 'schedules.route_id')
            ->join('ports', 'ports.id', '=', 'routes.next_port_id')
            ->join('ships', 'ships.id', '=', 'schedules.ship_id')
            ->where('ticket_code', $tCode)
            ->first();

        $person = Ticket::where('ticket_code', $tCode)->count();

        $update_ticket = Ticket::where('ticket_code', $tCode)->update(['status' => 2]);

        DB::commit();

        $data = [
            'ticket' => $ticket,
            'person' => $person
        ];

        return response()->json($data);
    }

    public function print(Request $request)
    {
        DB::beginTransaction();
        $ticket = Ticket::where('ticket_code', $request->ticket_code)->first();

        $route = Schedule::select('route_id', 'name')
            ->join('routes', 'routes.id', '=', 'schedules.route_id')
            ->join('ports', 'ports.id', '=', 'routes.port_id')
            ->where('schedules.id', $ticket->schedule->id)
            ->first();

        $next_route = Schedule::select('route_id', 'name')
            ->join('routes', 'routes.id', '=', 'schedules.route_id')
            ->join('ports', 'ports.id', '=', 'routes.next_port_id')
            ->where('schedules.id', $ticket->schedule->id)
            ->first();

        $persons = Ticket::where('ticket_code', $request->ticket_code)->get();

        $update_ticket = Ticket::where('ticket_code', $request->ticket_code)->update(['status' => 3]);
        DB::commit();

        try {
            $pdf = FacadePdf::loadView('employee.tickets.print', [
                'tiket' => $ticket,
                'route' => $route,
                'next_route' => $next_route,
                'persons' => $persons
            ]);

            return $pdf->stream();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function manual($tCode)
    {
        DB::beginTransaction();
        $ticket = Ticket::where('ticket_code', $tCode)->first();

        $route = Schedule::select('route_id', 'name')
        ->join('routes', 'routes.id', '=', 'schedules.route_id')
        ->join('ports', 'ports.id', '=', 'routes.port_id')
        ->where('schedules.id', $ticket->schedule->id)
            ->first();

        $next_route = Schedule::select('route_id', 'name')
        ->join('routes', 'routes.id', '=', 'schedules.route_id')
        ->join('ports', 'ports.id', '=', 'routes.next_port_id')
        ->where('schedules.id', $ticket->schedule->id)
            ->first();

        $persons = Ticket::where('ticket_code', $tCode)->get();

        $update_ticket = Ticket::where('ticket_code', $tCode)->update(['status' => 3]);
        DB::commit();

        try {
            $pdf = FacadePdf::loadView('employee.tickets.print', [
                'tiket' => $ticket,
                'route' => $route,
                'next_route' => $next_route,
                'persons' => $persons
            ]);

            return $pdf->stream();
        } catch (Exception $e) {
            return $e;
        }
    }
}
