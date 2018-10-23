<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grados extends Migration
{

    public function up()
    {
    Schema::create('grados',function (Blueprint $table){
            $table->increments('id_gra');
            $table->string('nombre',50);
           
            $table->rememberToken();
            $table->timestamps();
    });
    }

    public function down()
    {
    Schema::drop('grados');
    }
}
