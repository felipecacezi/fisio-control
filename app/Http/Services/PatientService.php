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

    public static function update($arData)
    {
        try {
            $patient = Patient::findOrFail($arData->id);
            $patient->update($arData->all());
            return true;
        } catch (\Throwable $th) {
            throw new \Exception(
                "Ocorreu um problema ao alterar o paciente {$arData->patient_name}, entre em contato com o suporte."
            );
        }
    }

    public static function store($arData)
    {
        try {
            Patient::create($arData->all());
            return true;
        } catch (\Throwable $th) {
            throw new \Exception(
                "Ocorreu um problema ao gravar o paciente {$arData->patient_name}, entre em contato com o suporte."
            );
        }
    }

    public static function destroy($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->update([
                'patient_active' => 0
            ]);
            return true;
        } catch (\Throwable $th) {
            throw new \Exception(
                "Ocorreu um problema ao inativar o paciente selecionado, entre em contato com o suporte."
            );
        }
    }
}
