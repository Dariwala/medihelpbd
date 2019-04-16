<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('pharmacy_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('pharmacy_notice_title')->nullable();
            $table->string('b_pharmacy_notice_title')->nullable();
            $table->longText('pharmacy_notice_description')->nullable();
            $table->longText('b_pharmacy_notice_description')->nullable();
            $table->Integer('pharmacy_id')->unsigned();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacy')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('pharmacy_notice');
    }
}
