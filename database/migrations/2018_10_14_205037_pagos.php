<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagos extends Migration
{

    public function up()
    {
    Schema::create('pagos',function (Blueprint $table){
            $table->increments('id_p');
            $table->string('concepto',40);
            
            $table->integer('id_t')->unsigned();
            $table->foreign('id_t')->references('id_t')->on('tallas');

            $table->string('cantidad',40);
            $table->string('costo',50);

            $table->integer('id_gra')->unsigned();
            $table->foreign('id_gra')->references('id_gra')->on('grados');

            $table->string('total',50);

            $table->date('fecha');

            $table->string('periodo',50);

            $table->string('form_pago',50);
            
            $table->integer('id_ciclo')->unsigned();
            $table->foreign('id_ciclo')->references('id_ciclo')->on('ciclosescolares');        

            $table->rememberToken();
            $table->timestamps();
    });

    }

    public function down()
    {
        Schema::drop('pagos');
    }
}
