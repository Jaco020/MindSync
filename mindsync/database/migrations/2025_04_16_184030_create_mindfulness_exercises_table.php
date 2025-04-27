<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mindfulness_exercises', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('instructions');
            $table->integer('duration_minutes');
            $table->string('difficulty'); // easy, medium, hard - levele do medytacji 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mindfulness_exercises');
    }
};