<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\Payment;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')->get();

        return view('employee.payments.index', [
            'title' => 'Validasi Pembayaran',
            'nvb' => 'payments',
            'payments' => $payments
        ]);
    }

    public function ticket_information($tcode)
    {
        $ticket = Ticket::where('ticket_code', $tcode)->first();

        $route = Schedule::select('route_id', 'p.name as port', 'np.name as next_port')
        ->join('routes', 'routes.id', '=', 'schedules.route_id')
        ->join('ports as p', 'p.id', '=', 'routes.port_id')
        ->join('ports as np', 'np.id', '=', 'routes.next_port_id')
        ->where('schedules.id', $ticket->schedule->id)
            ->first();

        $passengers = Ticket::where('ticket_code', $tcode)->count();

        $ticket->user->name;

        $ticket->schedule->ship->name;

        $data = [
            'ticket' => $ticket,
            'route' => $route,
            'passengers' => $passengers
        ];

        return response()->json($data);
    }

    public function confirm($tcode, $payid)
    {
        DB::beginTransaction();
        $ticket = Ticket::where('ticket_code',  $tcode)->update(['status' => 1]);
        $payment = Payment::find($payid);

        $payment->status = 3;
        $payment->save();
        DB::commit();
        
        toast('Pembayaran dikonfirmasi!', 'success');

        return redirect()->route('employee-payment');
    }

    public function reject($tcode, $payid)
    {
        DB::beginTransaction();
        $ticket = Ticket::where('ticket_code',  $tcode)->update(['status' => 0]);
        
        $payment = Payment::find($payid);
        $payment->status = 0;
        $payment->save();
        DB::commit();

        toast('Pembayaran ditolak!', 'warning');

        return redirect()->route('employee-payment');
    }
}
