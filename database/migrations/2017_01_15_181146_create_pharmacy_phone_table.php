<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyPhoneTable extends Migration
{
    public function up()
    {
        Schema::create('pharmacy_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pharmacy_phone_no')->nullable();
            $table->Integer('pharmacy_id')->unsigned();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacy')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('pharmacy_phone');
    }
}
