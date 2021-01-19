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
        $program_studi = new Department();
        $program_studi->initial = 'IBM-RC';
        $program_studi->name = 'International Business Management - Regular';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'IBM-IC';
        $program_studi->name = 'International Business Management - International';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'ACC';
        $program_studi->name = 'Akuntansi';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'FIKOM';
        $program_studi->name = 'Ilmu Komunikasi';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'HTB';
        $program_studi->name = 'Hospitality and Tourism Business';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'CBZ';
        $program_studi->name = 'Bisnis Kuliner';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'PSY';
        $program_studi->name = 'Psikologi';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'IMT';
        $program_studi->name = 'Informatika';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'ISB';
        $program_studi->name = 'Information System Business';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'VCD';
        $program_studi->name = 'Desain Komunikasi Visual';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'INA';
        $program_studi->name = 'Arsitektur Interior';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'FDB';
        $program_studi->name = 'Bisnis Desain Fashion';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'MED';
        $program_studi->name = 'Kedokteran';
        $program_studi->save();

        $program_studi = new Department();
        $program_studi->initial = 'FTP';
        $program_studi->name = 'International Food Technology';
        $program_studi->save();

    }
}
