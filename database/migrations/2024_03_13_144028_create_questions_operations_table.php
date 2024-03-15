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
        Schema::create('questions_operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionId');
            $table->unsignedBigInteger('operationId');
            $table->foreign('questionId')->references('id')->on('questions');
            $table->foreign('operationId')->references('id')->on('operations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions_operations');
    }
};
