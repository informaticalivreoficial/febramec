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
        Schema::create('tenant_gbs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tenant');
            $table->string('path');
            $table->boolean('cover')->nullable();
            
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
        Schema::dropIfExists('tenant_gbs');
    }
};
