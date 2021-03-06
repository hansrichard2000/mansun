<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mansun_divisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_divisi', 20);
            $table->unsignedBigInteger('proker_id');
            $table->foreign('proker_id')->references('id')->on('mansun_prokers');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('mansun_users');
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
        Schema::dropIfExists('mansun_divisis');
    }
}
