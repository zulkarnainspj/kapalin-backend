<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ship;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $request->validate([
            'name' => ['required', 'min:3'],
            'capacity' => ['required', 'numeric'],            
        ]);
        
        $ship = new Ship;
        $ship->name = $request->name;
        $ship->kapasitas = $request->capacity;
        $ship->save();

        Alert::success('Sukses', $ship->name . ' berhasil ditambahkan');

        return redirect('/admin/ships');
    }    

    public function edit($id)
    {
        $ship = Ship::find($id);

        return view('admin.ships.edit', [
            'title' => 'Kapal',
            'nvb' => 'ships',
            'ship' => $ship
        ]);
    }

    public function update(Request $request)
    {
        $ship = Ship::find($request->id);
        $ship->name = $request->name;
        $ship->kapasitas = $request->capacity;
        $ship->save();

        Alert::success('Sukses', $ship->name . ' berhasil diperbarui');

        return redirect('/admin/ships');
    }

    public function destroy($id)
    {
        $ship = Ship::find($id);
        $ship->delete();

        return redirect('/admin/ships');
    }
}
