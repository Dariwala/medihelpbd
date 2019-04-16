<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalCenterEmailTable extends Migration
{
    public function up()
    {
        Schema::create('herbal_center_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('herbal_center_email_ad')->nullable();
            $table->Integer('herbal_center_id')->unsigned();
            $table->timestamps();
            $table->foreign('herbal_center_id')->references('id')->on('herbal_center')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('herbal_center_email');
    }
}
