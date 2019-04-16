<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalCenterServiceTable extends Migration
{
    public function up()
    {
        Schema::create('herbal_center_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('herbal_center_service_title')->nullable();
            $table->string('b_herbal_center_service_title')->nullable();
            $table->longText('herbal_center_service_description')->nullable();
            $table->longText('b_herbal_center_service_description')->nullable();
            $table->Integer('herbal_center_id')->unsigned();
            $table->Integer('service_id')->unsigned();
            $table->Integer('subservice_id')->unsigned();
            $table->timestamps();
            $table->foreign('herbal_center_id')->references('id')->on('herbal_center')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subservice_id')->references('id')->on('subservice')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('herbal_center_service');
    }
}
