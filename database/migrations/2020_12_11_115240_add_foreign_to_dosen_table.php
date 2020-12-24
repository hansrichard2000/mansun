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
        Schema::table('lecturers', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id')->index()->after('photo');
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->unsignedBigInteger('title_id')->index()->after('department_id');
            $table->foreign('title_id')->references('title_id')->on('titles');
            $table->unsignedBigInteger('jaka_id')->index()->after('title_id');
            $table->foreign('jaka_id')->references('jaka_id')->on('jakas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->dropColumn('department_id');
            $table->dropColumn('title_id');
            $table->dropColumn('jaka_id');
        });
    }
}
