<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ticket;
use App\Models\Admin\User;
use App\Models\Employee\Person;
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

        // for ($i=0; $i < $jumlahPenumpang; $i++) { 
        //     echo '[PERSON]<br>';
        //     echo 'No ID : ' . $request->no_id[$i] . '<br>';
        //     echo 'Name : ' . $request->nama_penumpang[$i]  . '<br>';
        //     echo 'Tgl Lahir : ' . $request->date_of_birth[$i]  . '<br>';
        //     echo 'Jenis Kelamin : ' . $request->gender[$i]  . '<br><br>';
        // }

        DB::beginTransaction();
        $schedule = Schedule::find($request->schedule_id);

        // $route = Schedule::select('route_id', 'name')
        // ->join('routes', 'routes.id', '=', 'schedules.route_id')
        // ->join('ports', 'ports.id', '=', 'routes.next_port_id')
        // ->where('schedules.id', $schedule->id)
        // ->first();

        $pemesan = User::where('email', $request->email_pemesan)->first();

        for ($i = 0; $i < $jumlahPenumpang; $i++) {
            // $request->validate([
            //     'schedule' => ['required', 'numeric'],
            //     "no_id.$i" => ['numeric', 'required'],
            //     "name.$i" => ['required', 'min:3'],
            //     "date_of_birth.$i" => ['rquired'],
            //     "gender.$i" => ['numeric', 'required'],
            // ]);

            $person = new Person;
            $person->no_id = $request->no_id[$i];
            $person->name = $request->nama_penumpang[$i];
            $person->date_of_birth = $request->date_of_birth[$i];
            $person->gender = $request->gender[$i];
            $person->save();

            $ticket = new Ticket;
            $ticket->user_id = $pemesan->id;
            $ticket->person_id = $person->id;
            $ticket->schedule_id = $schedule->id;
            $ticket->ticket_code = $request->ticket_code;
            $ticket->price = ($schedule->price * $jumlahPenumpang);
            $ticket->save();
        }
        DB::commit();

        Alert::success('Sukses', 'Pembelian tiket berhasil');

        return redirect('/cus/' . $request->ticket_code);
        // return redirect('/cus/' . 'KB112625224711');
    }

    public function tiket($t_code)
    {
        $ticket = Ticket::where('ticket_code', $t_code)->first();
        $route = Schedule::select('route_id', 'name')
        ->join('routes', 'routes.id', '=', 'schedules.route_id')
        ->join('ports', 'ports.id', '=', 'routes.next_port_id')
        ->where('schedules.id', $ticket->schedule->id)
        ->first();

        $persons = Ticket::where('ticket_code', $t_code)->get();

        try {
            $pdf = FacadePdf::loadView('customers.tiket.tiket', [
                'tiket' => $ticket,
                'rute' => $route,
                'persons' => $persons
            ]);

            return $pdf->stream();
        }catch(Exception $e){
            return $e;
        }
        
    }
}


