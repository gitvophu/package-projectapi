<?php

use Illuminate\Support\Facades\Schema;
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
        // Email, Họ tên, Điện thoại, Mật khẩu mã hóa, thời điểm đăng ký
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('image',100);
            $table->string('email',100)->unique();
            $table->string('password',100);
            $table->string('token',100);
            $table->string('reset_pass_token',100);
            $table->integer('token_expire');
            $table->integer('token_status');
            $table->integer('role');

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
