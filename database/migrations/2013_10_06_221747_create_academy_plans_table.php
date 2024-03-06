<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tenant')->nullable();
            $table->string('name');
            $table->text('content')->nullable();
            $table->integer('status')->nullable();                    
            
            $table->decimal('value_monthly', 10, 2)->nullable();            
            $table->decimal('value_quarterly', 10, 2)->nullable();            
            $table->decimal('value_semi-annual', 10, 2)->nullable();            
            $table->decimal('value_anual', 10, 2)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('tenant')->references('id')->on('tenants')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academy_plans');
    }
};
