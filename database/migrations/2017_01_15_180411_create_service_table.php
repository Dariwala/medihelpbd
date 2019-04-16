<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name');
            $table->string('b_service_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service');
    }
}
