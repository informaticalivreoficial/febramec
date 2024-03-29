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
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('plan_id');
            $table->uuid('uuid');
            $table->string('name')->unique();
            $table->string('social_name')->nullable();
            $table->string('alias_name')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('init_date')->nullable();            
            $table->string('cnpj')->nullable();
            $table->string('ie')->nullable();
            $table->string('domain')->nullable();
            $table->string('subdomain')->unique();
            $table->string('template')->nullable();
            $table->string('template_exclusive')->nullable();

            /** imagens */
            $table->string('logo')->nullable();
            $table->string('logo_admin')->nullable();
            $table->string('logo_footer')->nullable();
            $table->string('favicon')->nullable();
            $table->string('metaimg')->nullable();
            $table->string('imgheader')->nullable();
            $table->string('watermark')->nullable();
            
            /** contact */
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->string('telegram')->nullable();
            $table->string('email')->nullable();
            $table->string('additional_email')->nullable();
            
            /** address */
            $table->string('postcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            
            /** socials */
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();            
            
            /** seo */
            $table->text('information')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->text('maps_google')->nullable();
            $table->text('metatags')->nullable();
            $table->string('analytics_id')->nullable();
            $table->string('rss')->nullable();            
            $table->date('rss_data')->nullable();
            $table->string('sitemap')->nullable();
            $table->date('sitemap_data')->nullable();
            $table->bigInteger('views')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
};
