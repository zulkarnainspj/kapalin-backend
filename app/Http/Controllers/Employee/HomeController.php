<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\Schedule;
use App\Models\Admin\Ship;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $date = date_create();

        $dipesan = Ticket::where('status', '>', 0)
            ->whereRaw('WEEK(created_at) = WEEK(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())')
            ->count();

        $checkin = Ticket::whereRaw('WEEK(updated_at) = WEEK(CURRENT_DATE()) AND YEAR(updated_at) = YEAR(CURRENT_DATE()) AND status IN (2,4)')
            ->count();

        $jadawal_aktif = Schedule::where('status', 1)
            ->where('etd', '>=', $date)
            ->count();

        $kapal = Ship::count();

        $total_tiket = Ticket::whereMonth('created_at', $date->format('m'))
            ->whereYear('created_at', $date->format('Y'))
            ->where('status', 4)
            ->count();

        $order_terbaru = Ticket::orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();

        $chart = Ticket::select(DB::raw('count(id) as jum'), DB::raw('WEEK(created_at) as minggu'))
            ->whereMonth('created_at', $date->format('m'))
            ->whereYear('created_at', $date->format('Y'))
            ->where('status', 4)
            ->groupBy('minggu')
            ->get();
        
        return view('employee.index', [
            'title' => 'Dashboard',
            'nvb' => 'home',
            'dipesan' => $dipesan,
            'checkin' => $checkin,
            'jadwal_aktif' => $jadawal_aktif,
            'kapal' => $kapal,
            'total_tiket' => $total_tiket,
            'order_terbaru' => $order_terbaru,
            'chart' => $chart
        ]);
    }
}
