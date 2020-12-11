<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dosen', function (Blueprint $table) {
            $table->unsignedBigInteger('prodi_id')->index()->after('passfoto');
            $table->foreign('prodi_id')->references('id')->on('program_studi');
            $table->unsignedBigInteger('jabatan_id')->index()->after('prodi_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatan');
            $table->unsignedBigInteger('jaka_id')->index()->after('jabatan_id');
            $table->foreign('jaka_id')->references('id')->on('jaka');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dosen', function (Blueprint $table) {
            $table->dropColumn('prodi_id');
            $table->dropColumn('jabatan_id');
            $table->dropColumn('jaka_id');
        });
    }
}
