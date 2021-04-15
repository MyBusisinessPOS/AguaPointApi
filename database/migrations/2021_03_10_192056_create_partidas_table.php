<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('ventas_id')->unsigned();
            $table->bigInteger('productos_id')->unsigned();
            $table->double('cantidad');
            $table->double('precio');
            $table->double('costo');
            $table->double('impuesto');
            $table->string('fecha');
            $table->string('hora',10);
            $table->text('observ');
            $table->bigInteger('venta');
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
        Schema::dropIfExists('partidas');
    }
}
