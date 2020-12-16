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
            $table->unsignedBigInteger('student_id')->index()->after('id')->nullable();
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->unsignedBigInteger('lecturer_id')->index()->after('student_id')->nullable();
            $table->foreign('lecturer_id')->references('lecturer_id')->on('lecturers');
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
            $table->dropColumn('student_id');
            $table->dropColumn('lecturer_id');
        });
    }
}
