<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalEmailTable extends Migration
{
    public function up()
    {
        Schema::create('hospital_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hospital_email_ad')->nullable();
            $table->Integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('hospital_email');
    }
}
