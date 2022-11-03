<?php

namespace App\Http\Controllers\API\Admin\Data;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KapalController extends Controller
{
    public function index()
    {
        $ships = Ship::orderBy('name')->get();

        return response()->json([
            'success' => true,
            'ships' => $ships,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'kapasitas' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $ship = new Ship;
        $ship->name = $request->name;
        $ship->kapasitas = $request->kapasitas;
        $ship->save();

        return response()->json([
            'success' => true,
            'ship' => $ship,
            'message' => 'Data berhasil ditambahkan!',
        ], 200);
    }
}
