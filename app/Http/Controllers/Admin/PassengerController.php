<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = User::where('role', 2)->orderBy('name')->get();
        
        return view('admin.passengers.index', [
            'title' => 'Penumpang',
            'nvb' => 'passengers',
            'passengers' => $passengers
        ]);
    }
}
