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
        //Seeder Jaka
        $jaka = new Jaka();
        $jaka->name = 'Pagi-Malam';
        $jaka->save();
    }
}
