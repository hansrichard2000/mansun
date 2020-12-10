<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Seeder Account Admin
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@test.com';
        $user->angkatan = '2019';
        $user->telp = rand(000000000000,999999999999);
        $user->gender = '0';
        $user->password = Hash::make('12345678');
        $user->is_active = 1;
        $user->is_admin = 1;
        $user->save();

        //Seeder Account HOD
        $user = new User();
        $user->name = 'HOD';
        $user->email = 'hod@test.com';
        $user->angkatan = '2019';
        $user->telp = rand(000000000000,999999999999);
        $user->gender = '0';
        $user->password = Hash::make('12345678');
        $user->is_active = 1;
        $user->is_admin = 0;
        $user->save();

        //Seeder Account Koor
        $user = new User();
        $user->name = 'Koor';
        $user->email = 'koor@test.com';
        $user->angkatan = '2019';
        $user->telp = rand(000000000000,999999999999);
        $user->gender = '0';
        $user->password = Hash::make('12345678');
        $user->is_active = 1;
        $user->is_admin = 0;
        $user->save();

        //Seeder Account User
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@test.com';
        $user->angkatan = '2019';
        $user->telp = rand(000000000000,999999999999);
        $user->gender = '0';
        $user->password = Hash::make('12345678');
        $user->is_active = 1;
        $user->is_admin = 0;
        $user->save();
    }
}
