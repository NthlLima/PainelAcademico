<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->increments('matricula_id');
            $table->string('matricula_num', 20);
            $table->integer('aluno')->unsigned();
            $table->integer('curso')->unsigned();
            $table->integer('admissao')->unsigned();
            $table->date('data_ingresso');
            $table->foreign('aluno')->references('id_aluno')->on('alunos');
            $table->foreign('curso')->references('curso_id')->on('cursos');
            $table->foreign('admissao')->references('admissao_id')->on('admissaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
