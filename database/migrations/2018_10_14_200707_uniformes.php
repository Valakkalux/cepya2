<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Uniformes extends Migration
{

    public function up()
    {
    Schema::create('uniformes',function (Blueprint $table){
            $table->increments('id_u');
            $table->string('tipo',50);
            $table->integer('id_t')->unsigned();
            $table->foreign('id_t')->references('id_t')->on('tallas');
            $table->rememberToken();
            $table->timestamps();    
    });
}

    
    public function down()
    {
    Schema::drop('uniformes');
    }
}
