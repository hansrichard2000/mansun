<?php

namespace Database\Seeders;

use App\Models\Program_Studi;
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
        $program_studi = new Program_Studi();
        $program_studi->inisial = 'IMT';
        $program_studi->prodi = 'Informatika';
        $program_studi->save();

    }
}
