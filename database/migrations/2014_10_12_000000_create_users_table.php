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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('angkatan', 4);
            $table->string('telp', 20);
            $table->enum('gender', ['0', '1'])->default('1')->comment('0 = P, 1 = L');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('is_login', ['0', '1'])->default('0');
            $table->enum('is_active', ['0', '1'])->default('0');
            $table->enum('is_admin', ['0', '1'])->default('0')->comment('0 = Admin, 1 = Not Admin');

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
