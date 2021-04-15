<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("articulo");
            $table->string("descripcion");
            $table->string("unidad_medida");
            $table->string("status");
            $table->string("clave_sat");
            $table->string("unidad_sat");
            $table->double("precio")->default(0);
            $table->double("costo")->default(0);
            $table->integer("iva")->default(0);
            $table->integer("ieps")->default(0);
            $table->integer("prioridad");
            $table->string("region");
            $table->string("codigo_alfa")->nullable();
            $table->string("codigo_barras")->nullable();
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
        Schema::dropIfExists('productos');
    }
}
