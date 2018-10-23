<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{

    public function up()
    {
    Schema::create('usuarios',function (Blueprint $table){
            $table->increments('id_usu');
            $table->string('nombre',50);
            $table->string('ap_pat',50);
            $table->string('ap_ma',50);
            $table->string('correo',50);
            $table->string('contraseña',50);
            $table->string('telefono',50);
            $table->string('activo',50);
            $table->string('tipo',50);
            $table->rememberToken();
            $table->timestamps();
    });
    }

    
    public function down()
    {
    Schema::drop('usuarios');
    }
}
