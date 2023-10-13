<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');
            $table->text('description');
            $table->text('points')->nullable();
            $table->foreignId('category_id');
            $table->enum('status',['enable','disable'])->default('disable');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
