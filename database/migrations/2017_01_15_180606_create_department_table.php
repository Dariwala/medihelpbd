<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department_name');
            $table->string('b_department_name');
            $table->timestamps();
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('department');
    }
}
