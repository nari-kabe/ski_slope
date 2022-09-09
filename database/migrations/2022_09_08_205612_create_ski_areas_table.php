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
            $table->string('place_name', 40);
            $table->string('zip_code', 10);
            $table->string('prefecture', 10);
            $table->string('municipalities', 30);
            $table->string('after_address', 50);
            $table->text('home_page')->nullable();
            $table->string('phone_number', 60);
            $table->string('business_hours', 30);
            $table->string('evening_hours', 30)->nullable();
            $table->string('season', 30)->nullable();
            $table->text('lesson')->nullable();
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
