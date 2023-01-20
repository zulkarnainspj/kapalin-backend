<?php

namespace App\Http\Controllers\Admin;

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
            ->whereDate('created_at', $date->format('Y-m-d'))
            ->count();

        $checkin = Ticket::where('status', 3)
            ->whereDate('updated_at', $date->format('Y-m-d'))
            ->count();

        $jadawal_aktif = Schedule::where('status', 1)
            ->where('etd', '>=', $date)
            ->count();

        $kapal = Ship::count();

        $total_tiket = Ticket::whereYear('updated_at', $date
            ->format('Y'))
            ->where('status', 3)
            ->count();

        $order_terbaru = Ticket::orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();

        $chart = Ticket::select(DB::raw('count(id) as jum'), DB::raw('MONTH(created_at) as bulan'))
            ->whereYear('created_at', $date->format('Y'))
            ->where('status', 3)
            ->groupBy('bulan')
            ->get();

        return view('admin.index', [
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
