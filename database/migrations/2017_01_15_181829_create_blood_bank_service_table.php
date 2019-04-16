<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodBankServiceTable extends Migration
{
    public function up()
    {
        Schema::create('blood_bank_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blood_bank_service_title')->nullable();
            $table->string('b_blood_bank_service_title')->nullable();
            $table->longText('blood_bank_service_description')->nullable();
            $table->longText('b_blood_bank_service_description')->nullable();
            $table->Integer('blood_bank_id')->unsigned();
            $table->Integer('service_id')->unsigned();
            $table->Integer('subservice_id')->unsigned();
            $table->timestamps();
            $table->foreign('blood_bank_id')->references('id')->on('blood_bank')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subservice_id')->references('id')->on('subservice')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('blood_bank_service');
    }
}
