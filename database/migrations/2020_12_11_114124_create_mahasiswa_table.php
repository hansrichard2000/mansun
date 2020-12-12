<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('mahasiswa_id');
            $table->string('nim', 50)->unique();
            $table->string('nama', 50);
            $table->string('gender', 1);
            $table->string('email', 50)->unique();
            $table->string('phone')->nullable();
            $table->string('line_account')->nullable();
            $table->integer('angkatan');
            $table->text('keterangan')->nullable();
            $table->text('passfoto')->nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
}
