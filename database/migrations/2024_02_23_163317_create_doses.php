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
        Schema::create('doses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicationId');
            $table->foreign('medicationId')->references('id')->on('medications');
            $table->string('dose');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doses');
    }
};
