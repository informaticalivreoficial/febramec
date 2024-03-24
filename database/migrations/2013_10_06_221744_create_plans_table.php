<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number_of_fotos')->nullable();
            $table->text('content')->nullable();
            $table->string('slug')->nullable();
            $table->integer('status')->nullable();

            /** pricing and values */
            $table->integer('trial')->nullable();
            $table->boolean('display_value')->nullable();
            $table->decimal('value_monthly', 10, 2)->nullable();            
            $table->decimal('value_quarterly', 10, 2)->nullable();            
            $table->decimal('value_semi_anual', 10, 2)->nullable();            
            $table->decimal('value_anual', 10, 2)->nullable();            
            $table->decimal('value_bianual', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
