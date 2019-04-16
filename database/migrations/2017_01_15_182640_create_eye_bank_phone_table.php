<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEyeBankPhoneTable extends Migration
{
    public function up()
    {
        Schema::create('eye_bank_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eye_bank_phone_no')->nullable();
            $table->Integer('eye_bank_id')->unsigned();
            $table->timestamps();
            $table->foreign('eye_bank_id')->references('id')->on('eye_bank')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('eye_bank_phone');
    }
}
