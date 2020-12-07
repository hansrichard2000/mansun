<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('penanggung_jawab');
            $table->foreign('penanggung_jawab')->references('id')->on('users');
            $table->unsignedBigInteger('status_task_id');
            $table->foreign('status_task_id')->references('id')->on('status_tasks');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('penanggung_jawab');
            $table->dropColumn('status_task_id');
            $table->dropColumn('created_by');
        });
    }
}
