<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkiAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ski_area', function (Blueprint $table) {
            $table->increments('id');
            $table->string('place_name', 40);
            $table->text('home_page')->nullable();
            $table->string('phone_number', 60);
            $table->timestamp('business_hours');
            $table->time('evening_hours')->nullable();
            $table->timestamp('season')->nullable();
            $table->text('lesson')->nullable();
            $table->text('restaurant')->nullable();
            $table->text('spa')->nullable();
            $table->text('hotel')->nullable();
            $table->text('slope_map')->nullable();
            $table->integer('latitude');
            $table->integer('longitude');
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
        Schema::dropIfExists('ski_area');
    }
}
