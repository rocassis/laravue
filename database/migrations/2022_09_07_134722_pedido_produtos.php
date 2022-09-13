<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidoProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produtos', function (Blueprint $table){
            $table->id();
            $table->integer('pedido_id');
            $table->integer('produto_id');
            $table->integer('quantidade'); //Quantidade com 2 casas decimais, 1 => 100 => 1,00
            $table->integer('valor'); //Valor do produto multiplicado pela quantidade
            $table->smallInteger('status'); //1-em aberto, 2-aprovado, 3-recusado
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('produto_id')->references('id')->on('produtos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
