<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ship;
use Illuminate\Http\Request;

class ShipListController extends Controller
{
    public function index()
    {
        $ships = Ship::orderBy('name')->get();

        return response()->json([
            'success' => true,
            'ships' => $ships,
        ], 200);
    }

    public function schedule_list($id)
    {
        $ship = Ship::findOrFail($id);
        $schedule = $ship->schedule_active();

        return response()->json([
            'success' => true,
            'ship' => $ship,
            'schedule' => $schedule
        ], 200);
    }
}
