<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index()
    {
        $ships = Ship::orderBy('name')->get();

        return view('admin.ships.index', [
            'title' => 'Kapal',
            'nvb' => 'ships',
            'ships' => $ships
        ]);
    }

    public function create()
    {
        return view('admin.ships.create', [
            'title' => 'Kapal',
            'nvb' => 'ships'
        ]);
    }

    public function store(Request $request)
    {
        $ship = new Ship;
        $ship->name = $request->name;
        $ship->kapasitas = $request->capacity;
        $ship->save();

        return redirect('/admin/ships');
    }
}
