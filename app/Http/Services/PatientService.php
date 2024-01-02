<?php

namespace App\Http\Services;
use App\Models\Patient;

class PatientService
{

    public static function getAll()
    {
        return Patient::all()
            ->where(
                'patient_active',
                '=',
                '1'
            );
    }

    public static function getFiltered($arFilters)
    {
        $patient = Patient::where(
            'patient_name'
            ,'like'
            ,"{$arFilters['patient_name']}%"
        )->get();
        return $patient;
    }
}
