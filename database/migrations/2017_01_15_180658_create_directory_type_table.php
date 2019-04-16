<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectoryTypeTable extends Migration
{
    public function up()
    {
        Schema::create('directory_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('directory_type_name');
            $table->string('b_directory_type_name');
            $table->timestamps();
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('directory_type');
    }
}
