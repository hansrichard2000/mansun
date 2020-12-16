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
        //Seeder Account Student 1
        $user = new User();
        $user->student_id = '1';
        $user->email = 'ranggriawan@student.ciptra.ac.id';
        $user->password = Hash::make('12345678');
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();

        //Seeder Account Student 2
        $user = new User();
        $user->student_id = '2';
        $user->email = 'hrichard@student.ciptra.ac.id';
        $user->password = Hash::make('12345678');
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();

        //Seeder Account Lecturer 1
        $user = new User();
        $user->lecturer_id = '1';
        $user->email = 'dosen1@student.ciptra.ac.id';
        $user->password = Hash::make('12345678');
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();
    }
}
