<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
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
        //Seeder Mahasiswa 1
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = '0706011910020';
        $mahasiswa->nama = 'Reiner Anggriawan Jasin';
        $mahasiswa->gender = 'L';
        $mahasiswa->email = 'ranggriawan@student.ciputra.ac.id';
        $mahasiswa->phone = '89385739587';
        $mahasiswa->line_account = 'fsdfs';
        $mahasiswa->angkatan = '2019';
        $mahasiswa->keterangan = 'tidak ada keterangan';
        $mahasiswa->passfoto = 'tes.jpg';
        $mahasiswa->prodi_id = '1';
        $mahasiswa->save();

        //Seeder Mahasiswa 2
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = '0706011910007';
        $mahasiswa->nama = 'Hans Richard Alim Natadjaja';
        $mahasiswa->gender = 'L';
        $mahasiswa->email = 'hrichard@student.ciputra.ac.id';
        $mahasiswa->phone = '893857242525';
        $mahasiswa->line_account = 'gthhr';
        $mahasiswa->angkatan = '2019';
        $mahasiswa->keterangan = 'tidak ada keterangan';
        $mahasiswa->passfoto = 'tes1.jpg';
        $mahasiswa->prodi_id = '1';
        $mahasiswa->save();

        //Seeder Mahasiswa 3
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = '0706011910022';
        $mahasiswa->nama = 'Antonnio Benedict Bryan';
        $mahasiswa->gender = 'L';
        $mahasiswa->email = 'abenedict@student.ciputra.ac.id';
        $mahasiswa->phone = '548696749696';
        $mahasiswa->line_account = 'ghj67';
        $mahasiswa->angkatan = '2019';
        $mahasiswa->keterangan = 'tidak ada keterangan';
        $mahasiswa->passfoto = 'tes2.jpg';
        $mahasiswa->prodi_id = '1';
        $mahasiswa->save();
    }
}
