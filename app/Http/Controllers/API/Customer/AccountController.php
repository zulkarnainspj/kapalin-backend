<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index($id){
        $user = User::select('name', 'no_id', 'gender', 'date_of_birth', 'email')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->first();

        return response()->json([
            'success' => true,
            'user' => $user,
        ], 200);
    }
}
