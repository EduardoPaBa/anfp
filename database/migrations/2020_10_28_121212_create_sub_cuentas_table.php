<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\BD;

class CreateSubCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->decimal('valor');
            $table->foreignId('cuentas_id');
            $table->foreign('cuentas_id')->references('id')->on('cuentas');
            
           

        });
        //Schema::create('role_sub_cuentas', function (Blueprint $table) {
        //$table->foreign('cuencod')->references('codigo')->on('cuentas');
        //});



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_cuentas');
    }
}
