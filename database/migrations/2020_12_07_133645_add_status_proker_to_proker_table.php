<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusProkerToProkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mansun_prokers', function (Blueprint $table) {
            $table->unsignedBigInteger('status_proker_id')->index()->after('periode_id');

            $table->foreign('status_proker_id')->references('id')->on('mansun_status_prokers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mansun_prokers', function (Blueprint $table) {
            $table->dropColumn('status_proker_id');
        });
    }
}
