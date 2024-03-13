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
        Schema::create('medications_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionId');
            $table->unsignedBigInteger('medicationId');
            $table->foreign('questionId')->references('id')->on('questions');
            $table->foreign('medicationId')->references('id')->on('medications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications_questions');
    }
};
