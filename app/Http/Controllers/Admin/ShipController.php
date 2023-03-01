<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ship;
use App\Models\Admin\ShipClass;
use App\Models\Admin\ShipClassTx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $classes = ShipClass::orderBy('name')->get();

        return view('admin.ships.create', [
            'title' => 'Kapal',
            'nvb' => 'ships',
            'classes' => $classes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
        ]);

        DB::beginTransaction();
        $ship = new Ship;
        $ship->name = $request->name;
        $ship->kapasitas = $request->capacity;
        $ship->save();

        foreach ($request->kelas as $item) {
            $kelas = new ShipClassTx;
            $kelas->ship_id = $ship->id;
            $kelas->class_id = $item;
            $kelas->capacity = $request["capacity_$item"];
            $kelas->save();
        }
        DB::commit();

        Alert::success('Sukses', $ship->name . ' berhasil ditambahkan');

        return redirect('/admin/ships');
    }

    public function edit($id)
    {
        $ship = Ship::find($id);
        $classes = ShipClass::orderBy('name')->get();

        return view('admin.ships.edit', [
            'title' => 'Kapal',
            'nvb' => 'ships',
            'ship' => $ship,
            'classes' => $classes
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'capacity' => ['required', 'numeric'],
        ]);

        DB::beginTransaction();
        $ship = Ship::find($request->id);
        $ship->name = $request->name;
        $ship->kapasitas = $request->capacity;
        $ship->save();

        $rmv = ShipClassTx::where('ship_id', $ship->id)->delete();

        foreach ($request->kelas as $item) {
            $kelas = new ShipClassTx;
            $kelas->ship_id = $ship->id;
            $kelas->class_id = $item;
            $kelas->save();
        }
        DB::commit();



        Alert::success('Sukses', $ship->name . ' berhasil diperbarui');

        return redirect('/admin/ships');
    }

    public function destroy($id)
    {
        $ship = Ship::find($id);
        $ship->delete();

        Alert::success('Sukses', $ship->name . ' berhasil dihapus');

        return redirect('/admin/ships');
    }
}
