<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plano');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('logomarca')->nullable();
            $table->string('metaimg')->nullable();
            $table->text('content')->nullable();
            $table->string('link')->nullable();
            $table->string('slug')->nullable();
            $table->text('mapa_google')->nullable();
            $table->text('metatags')->nullable();
            $table->integer('status')->nullable();
			$table->integer('email_send_count')->default(0);
			$table->bigInteger('views')->default(0);
            $table->integer('ano_de_inicio')->nullable();
            $table->string('dominio')->nullable();

            /** address */
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('num')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->integer('uf')->nullable();
            $table->integer('cidade')->nullable();

            /** contact */
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->string('telegram')->nullable();

            /** Redes Sociais */
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('fliccr')->nullable();

            $table->timestamps();

            $table->foreign('plano')->references('id')->on('planos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academias');
    }
}
