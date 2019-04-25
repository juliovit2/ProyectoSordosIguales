<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPreguntasFrecuentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_preguntas_frecuentes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('pregunta');
            $table->string('respuesta');
            $table->string('tipo');
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
        Schema::dropIfExists('tabla_preguntas_frecuentes');
    }
}
