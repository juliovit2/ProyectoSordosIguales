<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaUsuarioNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_usuario_notas', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('nota');
            $table->integer('usuarioid')->unsigned()->nullable();
            $table->foreign('usuarioid')->references('id')
                ->on('User')->onDelete('cascade');

            $table->integer('cursoid')->unsigned()->nullable();
            $table->foreign('cursoid')->references('id')
                ->on('tabla_cursos')->onDelete('cascade');

            $table->integer('notaid')->unsigned()->nullable();
            $table->foreign('notaid')->references('id')
                ->on('tabla_evaluaciones_cursos')->onDelete('cascade');

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
        Schema::dropIfExists('tabla_usuario_notas');
    }
}
