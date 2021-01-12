<?php

namespace Database\Seeders;

use App\Models\Jaka;
use Illuminate\Database\Seeder;

class JakaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeder Jaka Pengajar
        $jaka = new Jaka();
        $jaka->name = 'Pengajar';
        $jaka->save();

        //Seeder Jaka Asisten Ahli
        $jaka = new Jaka();
        $jaka->name = 'Asisten Ahli';
        $jaka->save();

        //Seeder Jaka Lektor
        $jaka = new Jaka();
        $jaka->name = 'Lektor';
        $jaka->save();

        //Seeder Jaka Lektor Kepala
        $jaka = new Jaka();
        $jaka->name = 'Lektor Kepala';
        $jaka->save();

        //Seeder Jaka Professor
        $jaka = new Jaka();
        $jaka->name = 'Professor';
        $jaka->save();
    }
}
