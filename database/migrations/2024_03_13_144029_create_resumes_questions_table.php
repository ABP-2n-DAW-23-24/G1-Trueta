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
        Schema::create('resumes_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionOperationId');
            $table->unsignedBigInteger('resumeId');
            $table->foreign('questionOperationId')->references('questionId')->on('questions_operations');
            $table->foreign('resumeId')->references('id')->on('resumes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes_questions');
    }
};
