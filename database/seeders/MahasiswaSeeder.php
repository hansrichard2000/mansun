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
        $mahasiswa->email = 'ranggriawan@student.ciputra.ac.id';
        $mahasiswa->angkatan = '2019';
        $mahasiswa->keterangan = 'tidak ada keterangan';
        $mahasiswa->passfoto = 'tes.jpg';
        $mahasiswa->prodi_id = '1';
        $mahasiswa->save();

        //Seeder Mahasiswa 2
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = '0706011910007';
        $mahasiswa->nama = 'Hans Richard Alim Natadjaja';
        $mahasiswa->email = 'hrichard@student.ciputra.ac.id';
        $mahasiswa->angkatan = '2019';
        $mahasiswa->keterangan = 'tidak ada keterangan';
        $mahasiswa->passfoto = 'tes1.jpg';
        $mahasiswa->prodi_id = '1';
        $mahasiswa->save();

        //Seeder Mahasiswa 3
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = '0706011910022';
        $mahasiswa->nama = 'Antonnio Benedict Bryan';
        $mahasiswa->email = 'abenedict@student.ciputra.ac.id';
        $mahasiswa->angkatan = '2019';
        $mahasiswa->keterangan = 'tidak ada keterangan';
        $mahasiswa->passfoto = 'tes2.jpg';
        $mahasiswa->prodi_id = '1';
        $mahasiswa->save();
    }
}
