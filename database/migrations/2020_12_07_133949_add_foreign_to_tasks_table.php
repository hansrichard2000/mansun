<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mansun_tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('penanggung_jawab')->index()->after('link_hasil_kerja');
            $table->foreign('penanggung_jawab')->references('id')->on('mansun_users');
            $table->unsignedBigInteger('status_task_id')->index()->after('penanggung_jawab');
            $table->foreign('status_task_id')->references('id')->on('mansun_status_tasks');
            $table->unsignedBigInteger('created_by')->index()->after('status_task_id');
            $table->foreign('created_by')->references('id')->on('mansun_users');
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
            $table->dropColumn('penanggung_jawab');
            $table->dropColumn('status_task_id');
            $table->dropColumn('created_by');
        });
    }
}
