<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Profile;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('admin.users.index', [
            'title' => 'Data Admin & Petugas',
            'nvb' => 'users',
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create', [
            'title' => 'Tambah Pengguna',
            'nvb' => 'users'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = strtolower($request->email);
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

        Alert::success('Sukses', $user->name . ' berhasil ditambahkan');

        return redirect('/admin/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', [
            'title' => 'Pengguna',
            'nvb' => 'users',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['min:6', 'nullable'],
            'no_id' => ['min:12', 'max:18'],
        ]);

        DB::beginTransaction();
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = strtolower($request->email);
        $user->role = $request->role;
        if ($user->password != ""){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $profile = Profile::find($user->id);
        
        if ($profile) {
            $profile->user_id = $user->id;
            $profile->no_id = $request->no_id;
            $profile->date_of_birth = $request->date_of_birth;
            $profile->gender = $request->gender;
            $profile->save();
        }else{
            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->no_id = $request->no_id;
            $profile->date_of_birth = $request->date_of_birth;
            $profile->gender = $request->gender;
            $profile->save();
        }
        
        DB::commit();

        Alert::success('Sukses', $user->name . ' berhasil diperbarui');

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $profile = Profile::where('user_id', $id)->first();
        if ($profile){
            $profile->delete();
        }

        $user = User::find($id);
        $user->delete();
        DB::commit();

        Alert::success('Sukses', $user->name . ' berhasil dihapus');

        return redirect('/admin/users');
    }
}
