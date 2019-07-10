<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaUsuarioCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_usuario_cursos', function (Blueprint $table) {

            $table->integer('asistencia');
            $table->enum('estado', ['Aprobado', 'Reprobado', 'Cursando'])->default('Cursando');
            $table->integer('usuarioid')->unsigned()->nullable();
            $table->foreign('usuarioid')->references('id')
                ->on('User')->onDelete('cascade');
            
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
        Schema::dropIfExists('tabla_usuario_cursos');
    }
}
