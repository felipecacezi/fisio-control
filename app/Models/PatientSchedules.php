<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\PatientScheduleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientSchedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'patient_schedules_start_sched',
        'patient_schedules_active',
    ];

    protected $casts = [
        'patient_evolution_date' => 'datetime',
    ];

    protected static function newFactory()
    {
        return PatientScheduleFactory::new();
    }
}
