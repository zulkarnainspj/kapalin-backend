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
        
        for ($i=0; $i < $jumlahPenumpang; $i++) {
            $request->validate([
                'ship' => ['required', 'numeric', 'not_in:0'],
                'route' => ['required','numeric', 'not_in:0'],
                'schedule' => ['required','numeric', 'not_in:0'],
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
            $ticket->save();
            
        }
        DB::commit();

        Alert::success('Sukses', 'Pembelian tiket berhasil');

        return redirect('/employee/tickets/');
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

    public function price($schedule_id)
    {
        $schedule = Schedule::select('id', 'price')->where('id', $schedule_id)->first();

        return response()->json($schedule);
    }

    public function check($tCode)
    {
        $ticket = Ticket::select('users.name as uname', 'ports.name as pname', 'ships.name as sname', 'ticket_code', 'etd', 'tickets.price')
        ->join('users', 'users.id', '=', 'tickets.user_id')
        ->join('schedules', 'schedules.id', '=', 'tickets.schedule_id')
        ->join('routes', 'routes.id', '=', 'schedules.route_id')
        ->join('ports', 'ports.id', '=', 'routes.next_port_id')
        ->join('ships', 'ships.id', '=', 'schedules.ship_id')
        ->where('ticket_code', $tCode)
        ->first();

        $person = Ticket::where('ticket_code', $tCode)->count();

        $data = [
            'ticket' => $ticket,
            'person' => $person
        ];

        return response()->json($data);
    }
}
