<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table){
            $table->id();
            $table->smallInteger('status'); //1-em aberto, 2-cancelado, 3-finalizado
            $table->integer('id_comprador');
            $table->integer('valor_total');
            $table->string('observacao',255);
            $table->dateTime('finalizado');
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
