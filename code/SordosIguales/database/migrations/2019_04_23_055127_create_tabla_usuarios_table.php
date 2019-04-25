<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_usuarios', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('rut')->unique();
            $table->string('correo')->unique();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('ciudad');
            $table->string('clave');
            $table->enum('rol',['Alumno', 'Administrador'])->default('Alumno');
            $table->boolean('cursando')->nullable();

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
        Schema::dropIfExists('tabla_usuarios');
    }
}
