<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiaGbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_gbs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('academia');
            $table->string('path');
            $table->boolean('cover')->nullable();
            
            $table->timestamps();

            $table->foreign('academia')->references('id')->on('academias')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academia_gbs');
    }
}
