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
        Schema::create('ideal_weights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('gender');


            $table->integer('minHeight');
            $table->integer('maxHeight');
            $table->integer('weight');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideal_weights');
    }
};
