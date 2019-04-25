<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaImagenesNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_imagenes_noticias', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('imagen');
            $table->integer('noticiaid')->unsigned()->nullable();
            $table->foreign('noticiaid')->references('id')
                ->on('tabla_noticias')->onDelete('cascade');
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
        Schema::dropIfExists('tabla_imagenes_noticias');
    }
}
