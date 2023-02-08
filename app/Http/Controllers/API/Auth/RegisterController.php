<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Profile;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'noId' => ['numeric', 'required', 'digits_between:12,18'],
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        DB::beginTransaction();
        $user = new User;
        $user->name = $request->name;
        $user->email = strtolower($request->email);
        $user->password = bcrypt($request->password);
        $user->role = 2;
        $user->save(); 

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->no_id = $request->noId;
        $profile->date_of_birth = $request->dateOfBirth;
        $profile->gender = $request->gender;
        $profile->save();
        DB::commit();

        if ($profile->id != null && $user->id != null){
            return response()->json([
                'success' => true,
                'user' => $user
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'user' => $user
            ], 500);
        }
        
    }
}
