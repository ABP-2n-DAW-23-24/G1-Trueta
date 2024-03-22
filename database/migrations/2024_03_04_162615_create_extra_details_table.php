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
        Schema::create('extra_details', function (Blueprint $table) {
            $table->id();
            $table->text('info');
            $table->unsignedBigInteger('operationId')->nullable();
            $table->foreign('operationId')->references('id')->on('operations');
            $table->unsignedBigInteger('surgeryId')->nullable();
            $table->foreign('surgeryId')->references('id')->on('surgeries');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('more_info');
    }
};
