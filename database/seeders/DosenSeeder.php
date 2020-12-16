<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeder Dosen 1
        $dosen = new Dosen();
        $dosen->nip = '66548959669';
        $dosen->nidn = '0284328234245';
        $dosen->name = 'Dosen1';
        $dosen->gender = 'P';
        $dosen->email = 'dosen1@test.com';
        $dosen->phone = '98672344';
        $dosen->line_account = 'deieif';
        $dosen->description = 'tidak ada keterangan';
        $dosen->photo = 'tes3.jpg';
        $dosen->department_id = '1';
        $dosen->title_id = '1';
        $dosen->jaka_id = '1';
        $dosen->save();
    }
}
