<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ticket;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($email)
    {
        $user = User::where('email', $email)->first();

        $tickets = Ticket::select('tickets.id', 'ships.name as ship', 'tickets.created_at', 'tickets.status', 'p.name as port', 'np.name as next_port')
            ->join('schedules', 'schedules.id', '=', 'tickets.schedule_id')
            ->join('ships', 'ships.id', '=', 'schedules.ship_id')
            ->join('routes', 'routes.id', '=', 'schedules.route_id')
            ->join('ports as p', 'p.id', '=', 'routes.port_id')
            ->join('ports as np', 'np.id', '=', 'routes.next_port_id')
            ->orderBy('created_at', 'desc')->where('user_id', $user->id)->get();


        return response()->json([
            'success' => true,
            'tickets' => $tickets,
        ], 200);
    }
}
