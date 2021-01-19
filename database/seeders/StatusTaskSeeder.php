<?php

namespace Database\Seeders;

use App\Models\Status_Task;
use Illuminate\Database\Seeder;

class StatusTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Seeder Status Belum disubmit
        $status_task = new Status_Task();
        $status_task->statustask = 'Not Submitted';
        $status_task->save();

        //Seeder Status Sudah disubmit
        $status_task = new Status_Task();
        $status_task->statustask = 'Submitted';
        $status_task->save();

        //Seeder Status Approved
        $status_task = new Status_Task();
        $status_task->statustask = 'Approved';
        $status_task->save();

        //Seeder Status Rejected
        $status_task = new Status_Task();
        $status_task->statustask = 'Rejected';
        $status_task->save();
    }
}
