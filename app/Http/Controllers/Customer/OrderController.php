<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Passenger;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ticket;
use App\Models\Admin\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    // public function parseJwt($token) {
    //         $base64Url = explode($token, ".");
    //         $base64 = str_replace("_", "/", str_replace("-",'+',$base64Url[1]));
    //         // $base64 = base64Url.replace('-', '+').replace('_', '/');
    //         return base64_decode($base64);
    // }

    public function index($j_penumpang, $pemesan, $schedule)
    {
        $pemesan = User::where('email', $pemesan)->first();
        $schedule = Schedule::find($schedule);

        $route = Schedule::select('route_id', 'name')
        ->join('routes', 'routes.id', '=', 'schedules.route_id')
        ->join('ports', 'ports.id', '=', 'routes.next_port_id')
        ->where('schedules.id', $schedule->id)
        ->first();

        $price = Schedule::select('id', 'price')->where('id', $schedule->id)->first();

        return view('customers.order.order', [
            'j_penumpang' => $j_penumpang,
            'pemesan' => $pemesan,
            'schedule' => $schedule,
            'rute' => $route,
            'price' => ($price->price * $j_penumpang),
        ]);
    }

    public function order(Request $request)
    {
        $jumlahPenumpang = $request->j_penumpang;

        DB::beginTransaction();
        $schedule = Schedule::find($request->schedule_id);

        $pemesan = User::where('email', $request->email_pemesan)->first();

        for ($i = 0; $i < $jumlahPenumpang; $i++) {

            $passenger = new Passenger;
            $passenger->no_id = $request->no_id[$i];
            $passenger->name = $request->nama_penumpang[$i];
            $passenger->date_of_birth = $request->date_of_birth[$i];
            $passenger->gender = $request->gender[$i];
            $passenger->save();

            $ticket = new Ticket;
            $ticket->user_id = $pemesan->id;
            $ticket->passenger_id = $passenger->id;
            $ticket->schedule_id = $schedule->id;
            $ticket->ticket_code = $request->ticket_code;
            $ticket->price = ($schedule->price * $jumlahPenumpang);
            $ticket->save();
        }
        DB::commit();

        Alert::success('Sukses', 'Pembelian tiket berhasil');

        return redirect('/cus/' . $request->ticket_code);
    }

    public function order_success($t_code)
    {
        $ticket = Ticket::where('ticket_code', $t_code)->first();

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

        $passengers = Ticket::where('ticket_code', $t_code)->get();

        return view('customers.tiket.index', [
            'tiket' => $ticket,
            'rute' => $route,
            'next_route' => $next_route,
            'passengers' => $passengers
        ]);
    }

    public function ticket($t_code)
    {
        $ticket = Ticket::where('ticket_code', $t_code)->first();

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

        $passengers = Ticket::where('ticket_code', $t_code)->get();

        try {
            $pdf = FacadePdf::loadView('customers.tiket.tiket', [
                'tiket' => $ticket,
                'rute' => $route,
                'next_route' => $next_route,
                'passengers' => $passengers
            ]);

            return $pdf->download("Kapalin_" . $t_code . ".pdf");
        }catch(Exception $e){
            return $e;
        }
        
    }

    public function get_user_data($email)
    {

        $user_profile = User::select('name', 'no_id', 'gender', 'date_of_birth', 'email')
            ->join('passengers', 'passengers.user_id', '=', 'users.id')
            ->where('email', $email)
            ->get();
        
        $user_no_profile = User::where('email', $email)->get();

        if (isset($user_profile->no_id)){
            $user = $user_profile;
        }else{
            $user = $user_no_profile;
        }


        return response()->json($user);
    }
}


