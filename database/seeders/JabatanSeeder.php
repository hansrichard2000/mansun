<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeder Title
        $jabatan = new Title();
        $jabatan->name = 'Ketua Program Studi';
        $jabatan->save();

    }
}
