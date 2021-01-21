<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeder Student 1
        $mahasiswa = new Student();
        $mahasiswa->nim = '0706011910020';
        $mahasiswa->name = 'Reiner Anggriawan Jasin';
        $mahasiswa->gender = 'L';
        $mahasiswa->email = 'ranggriawan@student.ciputra.ac.id';
        $mahasiswa->phone = '89385739587';
        $mahasiswa->line_account = 'fsdfs';
        $mahasiswa->batch = '2019';
        $mahasiswa->description = 'tidak ada keterangan';
        $mahasiswa->photo = 'tes.jpg';
        $mahasiswa->department_id = '1';
        $mahasiswa->save();

        //Seeder Student 2
        $mahasiswa = new Student();
        $mahasiswa->nim = '0706011910007';
        $mahasiswa->name = 'Hans Richard Alim Natadjaja';
        $mahasiswa->gender = 'L';
        $mahasiswa->email = 'hrichard@student.ciputra.ac.id';
        $mahasiswa->phone = '893857242525';
        $mahasiswa->line_account = 'gthhr';
        $mahasiswa->batch = '2019';
        $mahasiswa->description = 'tidak ada keterangan';
        $mahasiswa->photo = 'tes1.jpg';
        $mahasiswa->department_id = '1';
        $mahasiswa->save();

        //Seeder Student 3
        $mahasiswa = new Student();
        $mahasiswa->nim = '0706011910022';
        $mahasiswa->name = 'Antonnio Benedict Bryan';
        $mahasiswa->gender = 'L';
        $mahasiswa->email = 'abenedict@student.ciputra.ac.id';
        $mahasiswa->phone = '548696749696';
        $mahasiswa->line_account = 'ghj67';
        $mahasiswa->batch = '2019';
        $mahasiswa->description = 'tidak ada keterangan';
        $mahasiswa->photo = 'tes2.jpg';
        $mahasiswa->department_id = '1';
        $mahasiswa->save();

    }
}
