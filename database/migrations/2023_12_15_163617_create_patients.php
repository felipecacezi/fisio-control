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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 500);
            $table->string('patient_sex', 1);
            $table->dateTime('patient_born_date');
            $table->string('patient_zip_code', 8);
            $table->string('patient_street', 500);
            $table->string('patient_district', 500);
            $table->string('patient_city', 500);
            $table->string('patient_state', 2);
            $table->string('patient_country', 500);
            $table->string('patient_rg', 10);
            $table->string('patient_cpf', 12);
            $table->integer('patient_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
