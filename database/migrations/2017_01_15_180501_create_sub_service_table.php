<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubServiceTable extends Migration
{
    
    public function up()
    {
        Schema::create('subservice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_service_name');
            $table->string('b_sub_service_name');
            $table->Integer('service_id')->unsigned();
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('service')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('subservice');
    }
}
