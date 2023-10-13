<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{

    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('percent');
            $table->enum('status',['enable','disable'])->default('disable');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
