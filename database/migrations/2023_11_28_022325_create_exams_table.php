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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('score_numeric')->nullable();
            $table->integer('score_verbal')->nullable();
            $table->integer('score_logic')->nullable();
            // status exam enum [start, done]
            $table->enum('status_numeric', ['start', 'done'])->default('start');
            $table->enum('status_verbal', ['start', 'done'])->default('start');
            $table->enum('status_logic', ['start', 'done'])->default('start');
            // exam timer per category
            $table->integer('timer_numeric')->nullable();
            $table->integer('timer_verbal')->nullable();
            $table->integer('timer_logic')->nullable();

            $table->string('result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
