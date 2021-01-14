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
        $user->email = 'ranggriawan@student.ciputra.ac.id';
        $user->password = Hash::make('12345678');
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();

        //Seeder Account Student 2
        $user = new User();
        $user->student_id = '2';
        $user->email = 'hrichard@student.ciputra.ac.id';
        $user->password = Hash::make('12345678');
        $user->is_active = '1';
        $user->is_admin = '1';

        $user->save();//Seeder Account User 3
        $user = new User();
        $user->student_id = '3';
        $user->email = 'abenedict@student.ciputra.ac.id';
        $user->password = Hash::make('12345678');
        $user->is_active = '1';
        $user->is_admin = '0';
        $user->save();

        //Seeder Account Lecturer 1
        $user = new User();
        $user->lecturer_id = '1';
        $user->email = 'dosen1@student.ciputra.ac.id';
        $user->password = Hash::make('12345678');
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();

        //Seeder Account Lecturer 2
        $user = new User();
        $user->lecturer_id = '2';
        $user->email = 'dosen2@student.ciputra.ac.id';
        $user->password = Hash::make('12345678');
        $user->is_active = '1';
        $user->is_admin = '1';
        $user->save();
    }
}
