<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mansun_prokers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proker', 50);
            $table->unsignedBigInteger('periode_id');
            $table->foreign('periode_id')->references('id')->on('mansun_periodes');
            $table->text('deskripsi_proker');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->integer('pemasukan')->nullable();
            $table->integer('pengeluaran')->nullable();
            $table->string('medsos')->nullable();
            $table->text('proposal')->nullable();
            $table->text('lpj')->nullable();
            $table->text('gambar_proker')->nullable();
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
        Schema::dropIfExists('mansun_prokers');
    }
}
