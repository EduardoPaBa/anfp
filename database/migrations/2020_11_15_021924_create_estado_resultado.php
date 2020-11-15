<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoResultado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_resultado', function (Blueprint $table) {
            $table->id();
            $table->string('ingreso');
            $table->string('costodeventa');
            $table->string('gastodeoperacion');
            $table->string('gastodeadministracion');
            $table->string('gastodeventaymercadeo');
            $table->string('gastofinancieros');
            $table->string('otrosingresos');
            $table->string('reservalegal');
            $table->string('impuestosobrelarenta');



            $table->foreignId('informefinancieros_id');
            $table->foreign('informefinancieros_id')->references('id')->on('informefinancieros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_resultado');
    }
}
