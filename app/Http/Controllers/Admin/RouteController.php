<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Port;
use App\Models\Admin\Route;;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::orderBy('port_id')->get();

        return view('admin.routes.index', [
            'title' => 'Rute',
            'nvb' => 'routes',
            'routes' => $routes
        ]);
    }

    public function create()
    {
        $ports = Port::orderBy('name')->get();

        return view('admin.routes.create', [
            'title' => 'Rute',
            'nvb' => 'routes',
            'ports' => $ports,
            'next_ports' => $ports
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'next_port_id' => ['unique:routes'],            
        ]);

        $route = new Route;
        $route->port_id = $request->port;
        $route->next_port_id = $request->next_port_id;
        $route->save();

        Alert::success('Sukses', 'Rute berhasil ditambahkan');

        return redirect('/admin/routes');
    }

    public function edit($id)
    {
        $route = Route::findOrFail($id);
        $ports = Port::orderBy('name')->get();

        return view('admin.routes.edit', [
            'title' => 'Rute',
            'nvb' => 'routes',
            'route' => $route,
            'ports' => $ports,
            'next_ports' => $ports
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'next_port_id' => ['unique:routes'],
        ]);

        $route = Route::find($request->id);
        $route->port_id = $request->port;
        $route->next_port_id = $request->next_port;
        $route->save();

        Alert::success('Sukses', 'Rute berhasil diperbarui');

        return redirect('/admin/routes');
    }

    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();

        Alert::success('Sukses', 'Rute berhasil dihapus');

        return redirect('/admin/routes');
    }
}
