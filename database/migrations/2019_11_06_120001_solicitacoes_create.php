<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolicitacoesCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('produto_id')->foreign('produto_id')->references('id')->on('produtos');
            $table->unsignedInteger('responsavel_produto')->foreign('responsavel_produto')->references('id')->on('users');
            $table->Integer('quantidade');
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
        Schema::dropIfExists('solicitacoes');
    }
}
