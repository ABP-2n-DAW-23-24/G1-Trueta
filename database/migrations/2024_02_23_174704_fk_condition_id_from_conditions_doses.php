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
        Schema::table('conditions_doses', function (Blueprint $table) {
            $table->foreign('conditionId')->references('id')->on('conditions');
            $table->foreign('doseId')->references('id')->on('doses');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conditionsDoses', function (Blueprint $table) {
            //
        });
    }
};
