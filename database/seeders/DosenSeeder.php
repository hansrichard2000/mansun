<?php

namespace Database\Seeders;

use App\Models\Lecturer;
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
        //Seeder Lecturer 1
        $dosen = new Lecturer();
        $dosen->nip = '66548959669';
        $dosen->nidn = '0284328234245';
        $dosen->name = 'Evan Tanuwijaya';
        $dosen->gender = 'L';
        $dosen->email = 'evan@test.com';
        $dosen->phone = '98672344';
        $dosen->line_account = 'evan_t';
        $dosen->description = 'tidak ada keterangan';
        $dosen->photo = 'tes3.jpg';
        $dosen->department_id = '1';
        $dosen->title_id = '1';
        $dosen->jaka_id = '5';
        $dosen->save();

        //Seeder Lecturer 1
        $dosen = new Lecturer();
        $dosen->nip = '66548959670';
        $dosen->nidn = '0284328234246';
        $dosen->name = 'Laura Mahendratta';
        $dosen->gender = 'P';
        $dosen->email = 'laura@test.com';
        $dosen->phone = '98672734';
        $dosen->line_account = 'laura_m';
        $dosen->description = 'tidak ada keterangan';
        $dosen->photo = 'tes3.jpg';
        $dosen->department_id = '1';
        $dosen->title_id = '1';
        $dosen->jaka_id = '4';
        $dosen->save();
    }
}
