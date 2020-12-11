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
        //Seeder Account Mahasiswa 1
        $user = new User();
        $user->mahasiswa_id = '1';
        $user->password = Hash::make('12345678');
        $user->gender = 'L';
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();

        //Seeder Account Mahasiswa 2
        $user = new User();
        $user->mahasiswa_id = '2';
        $user->password = Hash::make('12345678');
        $user->gender = 'L';
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();

        //Seeder Account Dosen 1
        $user = new User();
        $user->dosen_id = '1';
        $user->password = Hash::make('12345678');
        $user->gender = 'P';
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();
    }
}
