<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index()
    {
        return view('employee.validation.index', [
            'title' => 'Validasi Tiket',
            'nvb' => 'validation'
        ]);
    }
}
