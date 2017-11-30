<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasferidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trasferidas', function (Blueprint $table) {
            $table->increments('disc_trans_id');
            $table->integer('disciplina')->unsigned();
            $table->integer('admissao')->unsigned();
            $table->foreign('disciplina')->references('disciplina_id')->on('disciplinas');
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
        Schema::dropIfExists('trasferidas');
    }
}
