<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->unsignedInteger('pedido');
            $table->string('transaction_id')->nullable();
            $table->timestamp('paid_date')->nullable();
            $table->date('vencimento')->nullable();
            $table->decimal('valor', 10, 2)->nullable(); 
            $table->string('status')->nullable();

            $table->timestamps();

            $table->foreign('pedido')->references('id')->on('pedidos')->onDelete('CASCADE');
            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faturas');
    }
}
