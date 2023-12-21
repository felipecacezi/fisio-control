<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_name' => $this->faker->name,
            'patient_sex' => $this->faker->randomElement(['h', 'm']),
            'patient_born_date' => $this->faker->dateTimeBetween('-40 years', 'now'),
            'patient_zip_code' => $this->faker->numerify('########'),
            'patient_street' => $this->faker->streetAddress,
            'patient_district' => $this->faker->city,
            'patient_city' => $this->faker->city,
            'patient_state' => $this->faker->stateAbbr,
            'patient_country' => $this->faker->country,
            'patient_rg' => $this->faker->numerify('#########'),
            'patient_cpf' => $this->faker->numerify('###########'),
            'patient_active' => 1,
        ];
    }
}
