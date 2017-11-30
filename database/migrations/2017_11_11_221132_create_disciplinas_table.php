<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('disciplina_id');
            $table->string('disciplina_nome', 100);
            $table->longText('ementa');
            $table->integer('num_horas');
            $table->integer('num_creditos');
            $table->integer('professor')->unsigned();
            $table->integer('departamento')->unsigned();
            $table->foreign('professor')->references('id_professor')->on('professors');
            $table->foreign('departamento')->references('dep_id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}
