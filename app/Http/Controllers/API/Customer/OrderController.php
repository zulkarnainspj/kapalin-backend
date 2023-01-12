<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function __invoke(Request $request)
    // {
    //     return response()->json([
    //         'success' => true,
    //         'order' => $request->dataPenumpang
    //     ], 200);
    // }

    public function index(Request $request)
    {
        return view('customers.order.order', [
            'jum' => $request->jumlah
        ]);
    }
}
