<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{

    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('post_id');
            $table->enum('reaction',['Like','Love', 'HaHa', 'Wow','Silent', 'Sad', 'Angry']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reactions');
    }
}
