<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ciclosescolares extends Migration
{
    
    public function up()
    {
    Schema::create('ciclosescolares',function(Blueprint $table){
            $table->increments('id_ciclo');
            $table->string('ciclo',50);
             $table->integer('id_gra')->unsigned();
            $table->foreign('id_gra')->references('id_gra')->on('grados');
            $table->rememberToken();
            $table->timestamps();
    });
    }

    public function down()
    {
    Schema::drop('ciclosescolares');
    }
}
