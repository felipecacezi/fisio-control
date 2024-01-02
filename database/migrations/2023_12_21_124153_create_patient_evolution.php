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
        Schema::create('patient_evolutions', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->dateTime('patient_evolution_date');
            $table->text('patient_evolution_description');
            $table->integer('patient_evolution_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_evolutions');
    }
};
