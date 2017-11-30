<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('curso_id');
            $table->string('curso_nome', 100);
            $table->integer('area_fk')->unsigned();
            $table->integer('coordenador')->unsigned();
            $table->integer('num_horas');
            $table->integer('num_creditos');
            $table->foreign('area_fk')->references('area_id')->on('area__atuacaos');
            $table->foreign('coordenador')->references('id_professor')->on('professors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
