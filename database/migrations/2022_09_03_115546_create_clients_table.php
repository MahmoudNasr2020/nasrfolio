<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job')->nullable();
            $table->string('image')->default('clients/default.png');
            $table->text('description');
            $table->enum('status',['enable','disable'])->default('disable');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
