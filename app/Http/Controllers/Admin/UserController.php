<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
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
            'title' => 'Tambah Admin / Petugas',
            'nvb' => 'users'
        ]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->hp;
        $user->email = $request->email;
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
            'title' => 'Edit Admin / Petugas',
            'nvb' => 'users',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->phone = $request->hp;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        $profile = Profile::find($user->id);
        
        if ($profile) {
            $profile->user_id = $user->id;
            $profile->date_of_birth = $request->date_of_birth;
            $profile->address = $request->address;
            $profile->save();
        }else{
            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->date_of_birth = $request->date_of_birth;
            $profile->address = $request->address;
            $profile->save();
        }
        
        DB::commit();

        Alert::success('Sukses', $user->name . ' berhasil diperbarui');

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success('Sukses', $user->name . ' berhasil dihapus');

        return redirect('/admin/users');
    }
}
