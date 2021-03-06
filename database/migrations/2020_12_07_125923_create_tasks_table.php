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
        Schema::create('mansun_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 50);
            $table->text('deskripsi')->nullable();
            $table->date('deadline');
            $table->text('link_hasil_kerja')->nullable();
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
        Schema::dropIfExists('mansun_tasks');
    }
}
