<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string("nombre")->nullable();
            $table->string("direccion")->nullable();
            $table->string("email")->nullable();
            $table->string("telefono")->nullable();
            $table->string("fecha_nacimiento");
            $table->string("fecha_ingreso")->nullable();
            $table->string("fecha_egreso")->nullable();
            $table->string("contrasenia")->nullable();
            $table->string("identificador");
            $table->boolean("status");
            $table->string("nss")->nullable();
            $table->string("rfc")->nullable();
            $table->string("curp")->nullable();
            $table->string("puesto")->nullable();
            $table->string("area_depto")->nullable();
            $table->string("tipo_contrato")->nullable();
            $table->string("region")->nullable();
            $table->string("hora_entrada")->nullable();
            $table->string("hora_salida")->nullable();
            $table->string("salida_comer")->nullable();
            $table->string("entrada_comer")->nullable();
            $table->double("sueldo_diario");
            $table->string("turno")->nullable();
            $table->text("path_image")->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
