<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSkiAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ski_area', function (Blueprint $table) {
            // ski_areaテーブルのカラムの型定義変更
            $table->string('business_hours', 30)->default(null)->change(); 
            $table->string('evening_hours', 30)->nullable()->change();
            $table->string('season', 30)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ski_area', function (Blueprint $table) {
            //
        });
    }
}
