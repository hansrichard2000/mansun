<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDivisiForeignToTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mansun_tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('divisi_id')->index()->after('penanggung_jawab');
            $table->foreign('divisi_id')->references('id')->on('mansun_divisis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mansun_tasks', function (Blueprint $table) {
            $table->dropColumn('divisi_id');
        });
    }
}
