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
        Schema::create('questions_op_med', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Question_id'); 
            $table->unsignedBigInteger('OperationMedication_id'); 
            $table->foreign('Question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('OperationMedication_id')->references('id')->on('op_med')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions_op_med');
    }
};
