<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job');
            $table->string('birthday');
            $table->string('website');
            $table->string('phone');
            $table->string('city');
            $table->string('degree');
            $table->integer('age');
            $table->string('mail');
            $table->enum('freelance',['متاح','غير متاح'])->default('متاح');
            $table->string('image');
            $table->string('cv');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedIn');
            $table->string('github');
            $table->string('whatsApp');
            $table->string('telegram');
            $table->string('site_name');
            $table->enum('site_status',['مفتوح','مغلق'])->default('مفتوح');
            $table->enum('site_lightness',['نهاري','ليلي'])->default('نهاري');
            $table->enum('site_color',['ازرق','احمر','اصفر'])->default('ازرق');
            $table->string('site_image');
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('details');
    }
}
