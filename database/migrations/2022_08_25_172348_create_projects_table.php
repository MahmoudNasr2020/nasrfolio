<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date');
            $table->string('category');
            $table->string('client');
            $table->string('location');
            $table->string('executor');
            $table->text('overview');
            $table->string('main_image');
            $table->json('images')->nullable();
            $table->string('video')->nullable();
            $table->enum('status',['enable','disable'])->default('disable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
