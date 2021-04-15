<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('venta'); 
            $table->string('tipo_doc',10);
            $table->date('fecha');
            $table->string('hora',10);
            $table->bigInteger('clientes_id')->unsiged();
            $table->bigInteger('empleados_id')->unsiged();
            $table->double('importe');
            $table->double('impuesto');
            $table->text('datos');
            $table->string('latitud',20);
            $table->string('longitud',20);
            $table->string('almacen',20);
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
        Schema::dropIfExists('ventas');
    }
}
