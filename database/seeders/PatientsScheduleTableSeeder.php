<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PatientSchedules;

class PatientsSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criando 10 pacientes fictícios
        PatientSchedules::factory()->count(10)->create();
    }
}
