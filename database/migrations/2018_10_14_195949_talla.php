<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Talla extends Migration
{

    public function up()
    {
    Schema::create('tallas',function (Blueprint $table){
            $table->increments('id_t');
            $table->string('medida',50);
            $table->string('precio',50);
            $table->rememberToken();
            $table->timestamps();
    });
    }


    public function down()
    {
    Schema::drop('tallas');
    }
}
