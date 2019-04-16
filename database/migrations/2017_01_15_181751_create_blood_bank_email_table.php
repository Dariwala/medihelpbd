<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodBankEmailTable extends Migration
{
    public function up()
    {
        Schema::create('blood_bank_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blood_bank_email_ad')->nullable();
            $table->Integer('blood_bank_id')->unsigned();
            $table->timestamps();
            $table->foreign('blood_bank_id')->references('id')->on('blood_bank')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('blood_bank_email');
    }
}
