<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('mahasiswa_id')->index()->after('id')->nullable();
            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswa');
            $table->unsignedBigInteger('dosen_id')->index()->after('mahasiswa_id')->nullable();
            $table->foreign('dosen_id')->references('dosen_id')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mahasiswa_id');
            $table->dropColumn('dosen_id');
        });
    }
}
