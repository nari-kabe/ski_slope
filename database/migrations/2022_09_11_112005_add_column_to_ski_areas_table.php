<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSkiAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ski_areas', function (Blueprint $table) {
            $table->text('parking_lot')->nullable()->change();
            $table->text('activity')->nullable()->change();
            $table->text('kids_park')->nullable()->change();
            $table->text('lift_ticket')->nullable()->change();
            $table->text('business_hours')->change();
            $table->text('evening_hours')->change();
            $table->text('season')->nullable()->change();
            $table->renameColumn('municipalities', 'city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ski_areas', function (Blueprint $table) {
            //
        });
    }
}