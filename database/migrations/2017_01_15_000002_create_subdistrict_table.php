<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDistrictTable extends Migration
{
    public function up()
    {
        Schema::create('subdistrict', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_district_name');
            $table->string('b_sub_district_name');
            $table->Integer('district_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('subdistrict');
    }
}
