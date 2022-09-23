<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_name', 20);
            $table->integer('sex');
            $table->integer('age')->nullable();
            $table->string('occupation', 10)->nullable();
            $table->text('activity')->nullable(); //変更 9/22現在いらない
            $table->string('ski_level', 10)->nullable(); //変更
            $table->string('snowboard_level', 10)->nullable(); //変更
            $table->text('others_level')->nullable();
            $table->string('experience', 20)->nullable();
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
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('users');
    }
}
