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
        Schema::create('op_med', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('operation_id'); 
            $table->unsignedBigInteger('medication_id'); 
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
            $table->foreign('medication_id')->references('id')->on('medications')->onDelete('cascade');
        
            // Opcional: Establece las dos claves foráneas como clave primaria.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
