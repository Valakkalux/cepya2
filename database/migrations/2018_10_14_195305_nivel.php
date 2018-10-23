<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nivel extends Migration
{
    public function up()
    {
        Schema::create('niveles',function (Blueprint $table){
            $table->increments('id_n');
            $table->string('nivel',50);
            $table->rememberToken();
            $table->timestamps();
    });
    }

    public function down()
    {
        Schema::drop('niveles');
    }
}
