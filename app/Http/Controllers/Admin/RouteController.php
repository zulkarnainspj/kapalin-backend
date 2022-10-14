<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\Route;
use Illuminate\Http\Request;

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
        $route = new Route;
        $route->port_id = $request->port;
        $route->next_port_id = $request->next_port;
        $route->distance = $request->distance;
        $route->save();

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
        $route = Route::find($request->id);
        $route->port_id = $request->port;
        $route->next_port_id = $request->next_port;
        $route->distance = $request->distance;
        $route->save();

        return redirect('/admin/routes');
    }

    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();

        return redirect('/admin/routes');
    }
}
