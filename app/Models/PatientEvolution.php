<?php

namespace App\Models;

use Database\Factories\PatientEvolutionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientEvolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'patient_evolution_date',
        'patient_evolution_description',
        'patient_evolution_active',
    ];

    protected $casts = [
        'patient_evolution_date' => 'datetime',
    ];

    protected static function newFactory()
    {
        return PatientEvolutionFactory::new();
    }
}
