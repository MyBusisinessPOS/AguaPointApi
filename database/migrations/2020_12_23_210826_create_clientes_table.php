<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_comercial");
            $table->string("calle");
            $table->string("numero");
            $table->string("colonia");
            $table->string("ciudad");
            $table->integer("codigo_postal");
            $table->string("fecha_registro");
            $table->string("fecha_baja");
            $table->string("cuenta");
            $table->string("grupo");
            $table->string("categoria");
            $table->boolean("status");
            $table->integer("consec");
            $table->string("region");
            $table->string("sector");
            $table->string("rango");
            $table->string("ruta");
            $table->integer("secuencia")->default(0);
            $table->integer("periodo")->default(0);
            $table->integer("lun")->default(0);
            $table->integer("mar")->default(0);
            $table->integer("mie")->default(0);
            $table->integer("jue")->default(0);
            $table->integer("vie")->default(0);
            $table->integer("sab")->default(0);
            $table->integer("dom")->default(0);
            $table->string("latitud")->nullable();
            $table->string("longitud")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
