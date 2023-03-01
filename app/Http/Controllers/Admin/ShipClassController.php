<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ShipClass;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ShipClassController extends Controller
{
    public function index()
    {
        $classess = ShipClass::orderBy('name')->get();

        return view('admin.classes.index', [
            'title' => 'Kelas',
            'nvb' => 'class',
            'classes' => $classess
        ]);
    }

    public function store(Request $request)
    {
        $shipClass = new ShipClass;
        $shipClass->name = $request->class;
        $shipClass->save();

        Alert::success('Kelas ' . $shipClass->name . ' berhasil ditambahkan');

        return redirect()->route('admin-class');
    }
}
