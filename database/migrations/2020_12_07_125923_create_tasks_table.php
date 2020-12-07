<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 50);
            $table->text('deskripsi')->nullable();
            $table->date('deadline');
            $table->text('link_hasil_kerja')->nullable();
//            $table->unsignedBigInteger('penanggung_jawab');
//            $table->foreign('penanggung_jawab')->references('id')->on('users');
//            $table->unsignedBigInteger('status_task_id');
//            $table->foreign('status_task_id')->references('id')->on('status_tasks');
//            $table->unsignedBigInteger('created_by');
//            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
