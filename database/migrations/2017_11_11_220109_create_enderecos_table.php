<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->integer('fk_pessoa')->unsigned();
            $table->string('ende_rua', 100);
            $table->string('ende_bairro', 100);
            $table->string('ende_cidade', 100);
            $table->string('ende_estado', 100);
            $table->string('ende_cep', 10);
            $table->foreign('fk_pessoa')->references('id_pessoa')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
