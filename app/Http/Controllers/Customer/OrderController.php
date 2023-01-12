<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($j_penumpang, $pemesan)
    {
        return view('customers.order.order', [
            'j_penumpang' => $j_penumpang
        ]);
    }
}
