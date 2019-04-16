<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration
{
    
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district_name');
            $table->string('b_district_name');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('district');
    }
}
