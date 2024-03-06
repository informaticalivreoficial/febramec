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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tenant')->nullable();
            $table->unsignedInteger('academy_plan')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('graduacao')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('code')->nullable();
            $table->rememberToken();  

            $table->dateTime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();

            /** Responsible */
            $table->string('responsible_name')->nullable();
            $table->string('responsible_cpf')->nullable();
            $table->string('responsible_rg', 20)->nullable();
            $table->string('responsible_phone')->nullable();

            /** data */
            $table->string('gender')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('rg_expedition')->nullable();
            $table->date('birthday')->nullable();
            $table->string('naturalness')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('avatar')->nullable();
            $table->string('additional_email')->nullable();

            /** address */
            $table->string('postcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            /** contact */
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->string('telegram')->nullable();

            /** Socials */
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();            
            $table->string('instagram')->nullable();

            /** access */
            $table->boolean('superadmin')->nullable();
            $table->boolean('admin')->nullable();
            $table->boolean('client')->nullable();
            $table->boolean('editor')->nullable();            

            $table->integer('status')->default('0');
            $table->longText('information')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('tenant')->references('id')->on('tenants')->onDelete('CASCADE');
            $table->foreign('academy_plan')->references('id')->on('academy_plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
