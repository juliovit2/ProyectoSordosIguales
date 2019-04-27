<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaEvaluacionesCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_evaluaciones_cursos', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombreEvaluacion');
            $table->integer('cursoid')->unsigned()->nullable();
            $table->foreign('cursoid')->references('id')
                ->on('tabla_cursos')->onDelete('cascade');
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
        Schema::dropIfExists('tabla_evaluaciones_cursos');
    }
}
