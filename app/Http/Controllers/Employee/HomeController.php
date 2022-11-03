<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('employee.index', [
            'title' => 'Dashboard',
            'nvb' => 'home'
        ]);
    }
}
