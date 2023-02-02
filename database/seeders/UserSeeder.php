<?php

namespace Database\Seeders;

use App\Models\Admin\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@kapalin.com';
        $user->password = bcrypt('1234');
        $user->role = 0;
        $user->save();
    }
}
