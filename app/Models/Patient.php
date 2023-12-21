<?php

namespace App\Models;

use Database\Factories\PatientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'patient_sex',
        'patient_born_date',
        'patient_zip_code',
        'patient_street',
        'patient_district',
        'patient_city',
        'patient_state',
        'patient_country',
        'patient_rg',
        'patient_cpf',
        'patient_hma',
        'patient_personal_antecedents',
        'patient_drugs_in_use',
        'patient_active',
    ];

    protected $casts = [
        'patient_born_date' => 'datetime',
    ];

    protected static function newFactory()
    {
        return PatientFactory::new();
    }
}
