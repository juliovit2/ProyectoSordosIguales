<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('profesorid')->unsigned()->nullable();
            $table->foreign('profesorid')->references('id')
                ->on('tabla_personas')->onDelete('cascade');
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
        Schema::dropIfExists('tabla_cursos');
    }
}
