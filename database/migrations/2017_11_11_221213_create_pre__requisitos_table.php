<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre__requisitos', function (Blueprint $table) {
            $table->integer('disciplina')->unsigned();
            $table->integer('pre_requisito')->unsigned();
            $table->increments('pr_id');
            $table->foreign('disciplina')->references('disciplina_id')->on('disciplinas');
            $table->foreign('pre_requisito')->references('disciplina_id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre__requisitos');
    }
}
