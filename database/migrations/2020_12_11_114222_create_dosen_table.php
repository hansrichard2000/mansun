<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('dosen_id');
            $table->string('nip', 50)->unique();
            $table->string('nidn', 50)->unique();
            $table->string('nama', 255);
            $table->string('gender', 1);
            $table->string('email', 255)->unique();
            $table->string('phone')->nullable();
            $table->string('line_account')->nullable();
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
        Schema::dropIfExists('dosen');
    }
}
