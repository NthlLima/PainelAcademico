<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferidos', function (Blueprint $table) {
            $table->increments('transf_id');
            $table->integer('admissao_fk')->unsigned();
            $table->string('faculdade_origem', 150);
            $table->foreign('admissao_fk')->references('admissao_id')->on('admissaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transferidos');
    }
}
