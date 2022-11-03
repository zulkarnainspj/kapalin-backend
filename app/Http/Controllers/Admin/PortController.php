<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Port;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PortController extends Controller
{
    public function index()
    {
        $ports = Port::orderBy('name')->get();

        return view('admin.ports.index', [
            'title' => 'Pelabuhan',
            'nvb' => 'ports',
            'ports' => $ports
        ]);
    }

    public function create()
    {
        return view('admin.ports.create', [
            'title' => 'Pelabuhan',
            'nvb' => 'ports'
        ]);
    }

    public function store(Request $request)
    {
        $port = new Port;
        $port->code = $request->code;
        $port->name = $request->name;
        $port->save();

        Alert::success('Sukses', $port->name . ' berhasil diperbarui');

        return redirect('/admin/ports');
    }

    public function edit($id)
    {
        $port = Port::findOrFail($id);

        return view('admin.ports.edit', [
            'title' => 'Pelabuhan',
            'nvb' => 'ports',
            'port' => $port
        ]);
    }

    public function update(Request $request)
    {
        $port = Port::find($request->id);
        $port->code = $request->code;
        $port->name = $request->name;
        $port->save();

        Alert::success('Sukses', $port->name . ' berhasil diperbarui');

        return redirect('/admin/ports');
    }

    public function destroy($id)
    {
        $port = Port::find($id);
        $port->delete();

        return redirect('/admin/ports');
    }
}
