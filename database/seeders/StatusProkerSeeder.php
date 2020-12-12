<?php

namespace Database\Seeders;

use App\Models\Status_Proker;
use Illuminate\Database\Seeder;

class StatusProkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Seeder Status Belum dimulai
        $status_proker = new Status_Proker();
        $status_proker->statusproker = 'Belum dimulai';
        $status_proker->save();

        //Seeder Status Sedang Berlangsung
        $status_proker = new Status_Proker();
        $status_proker->statusproker = 'Sedang Berlangsung';
        $status_proker->save();

        //Seeder Status Selesai
        $status_proker = new Status_Proker();
        $status_proker->statusproker = 'Selesai';
        $status_proker->save();

    }
}
