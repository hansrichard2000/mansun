<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Seeder Program Studi Informatika
        $program_studi = new Department();
        $program_studi->initial = 'IMT';
        $program_studi->name = 'Informatika';
        $program_studi->save();

        //Seeder Program Studi ISB
        $program_studi = new Department();
        $program_studi->initial = 'ISB';
        $program_studi->name = 'Information and System Business';
        $program_studi->save();

    }
}
