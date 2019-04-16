<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyEmailTable extends Migration
{
    public function up()
    {
        Schema::create('pharmacy_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pharmacy_email_ad')->nullable();
            $table->Integer('pharmacy_id')->unsigned();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacy')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('pharmacy_email');
    }
}
