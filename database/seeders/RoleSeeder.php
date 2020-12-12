<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        //Seeder Role Admin
//        $role = new Role();
//        $role->role = 'Admin';
//        $role->save();

        //Seeder Role HOD
        $role = new Role();
        $role->role = 'HOD';
        $role->save();

        //Seeder Role Koor
        $role = new Role();
        $role->role = 'Koor';
        $role->save();

        //Seeder Role User
        $role = new Role();
        $role->role = 'User';
        $role->save();

    }
}
