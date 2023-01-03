<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function check()
    {
        return response()->json([
            'success' => true,
            'user' => auth()->guard('api')->user()
        ], 200);
    }
}
