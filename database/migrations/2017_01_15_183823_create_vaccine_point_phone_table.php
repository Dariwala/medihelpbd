<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinePointPhoneTable extends Migration
{
    public function up()
    {
        Schema::create('vaccine_point_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vaccine_point_phone_no')->nullable();
            $table->Integer('vaccine_point_id')->unsigned();
            $table->timestamps();
            $table->foreign('vaccine_point_id')->references('id')->on('vaccine_point')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('vaccine_point_phone');
    }
}
