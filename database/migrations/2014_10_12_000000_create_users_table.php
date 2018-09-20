<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username', 20)->comment('用户名');
            $table->string('password')->comment('用户密码');
            $table->ipAddress('last_login_ip')->comment('最后一次登录IP');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `users` COMMENT="用户表"');
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
