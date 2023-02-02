<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Port;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PortController extends Controller
{
    public function index()
    {
        $ports = Port::orderBy('name')->get();
        $origin_port = Port::orderBy('name')->where('origin_port', 1)->count();

        return view('admin.ports.index', [
            'title' => 'Pelabuhan',
            'nvb' => 'ports',
            'ports' => $ports,
            'origin' => $origin_port
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

        Alert::success('Sukses', $port->name . ' berhasil dihapus');

        return redirect('/admin/ports');
    }

    public function origin($id)
    {
        DB::beginTransaction();

        Port::query()->update(['origin_port' => 0]);

        $port = Port::find($id);
        $port->origin_port = 1;
        $port->save();

        DB::commit();

        Alert::success('Sukses', $port->name . ' dijadikan pelabuhan utama');

        return redirect('/admin/ports');
    }
}
