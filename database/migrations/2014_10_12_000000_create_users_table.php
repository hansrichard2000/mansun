<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->enum('gender', ['L', 'P'])->default('L')->comment('L = laki-laki, P = perempuan');
            $table->enum('is_login', ['0', '1'])->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('is_active', ['0', '1'])->default('0');
            $table->enum('is_admin', ['0', '1'])->default('0')->comment('0 = Not Admin, 1 = Admin');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
