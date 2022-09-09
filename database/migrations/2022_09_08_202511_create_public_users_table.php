<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name', 20);
            $table->string('email', 30);
            $table->string('password', 10);
            $table->integer('sex');
            $table->integer('age')->nullable();
            $table->string('occupation', 10)->nullable();
            $table->string('event', 10);
            $table->string('experience', 20)->nullable();
            $table->string('level', 30)->nullable();
            $table->string('home_slope', 20)->nullable();
            $table->string('public_setting', 30)->nullable();
            $table->text('greeting')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_users');
    }
}
