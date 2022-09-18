<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkiAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ski_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('place_name', 40);
            $table->text('home_page')->nullable();
            $table->string('zip_code', 10);
            $table->string('prefecture', 10);
            $table->string('city', 10);
            $table->string('after_address', 50);
            $table->string('phone_number', 60);
            $table->text('business_hours');
            $table->text('lift_ticket')->nullable();
            $table->text('season')->nullable();
            $table->text('evening_hours')->nullable();
            $table->text('activity')->nullable();
            $table->string('ski', 10)->nullable(); //変更
            $table->string('snowboard', 10)->nullable(); //変更
            $table->text('lesson')->nullable();
            $table->text('kids_park')->nullable();
            $table->text('parking_lot')->nullable();
            $table->text('restaurant')->nullable();
            $table->text('spa')->nullable();
            $table->text('hotel')->nullable();
            $table->text('slope_map')->nullable();
            $table->integer('latitude')->nullable();
            $table->integer('longitude')->nullable();
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
        Schema::dropIfExists('ski_areas');
    }
}
