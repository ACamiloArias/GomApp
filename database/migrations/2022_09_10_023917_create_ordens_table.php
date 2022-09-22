<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('equipo_id')->unsigned();
            $table->bigInteger('tecnico_id')->unsigned();
            $table->bigInteger('repuesto_id')->unsigned();
            $table->string('TipoOrden');
            $table->string('Prioridad');
            $table->string('Estado');
            $table->string('Supervisor');
            $table->date('FechaProg');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->text('Trabajo');
         
          

            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete("cascade");
            $table->foreign('tecnico_id')->references('id')->on('tecnicos')->onDelete("cascade");
            $table->foreign('repuesto_id')->references('id')->on('repuestos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
