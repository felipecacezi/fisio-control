<?php

namespace App\Http\Services;
use App\Models\PatientSchedules;
use Carbon\Carbon;

class ScheduleService
{
    public static function checkSchedHour(string $schedDate)
    {

        $teste = explode('T', $schedDate);


        $dt = Carbon::createFromFormat('Y-m-d H:i', "{$teste[0]} {$teste[1]}");
        $dt->addHour(1);

        // dd($dt);


        $teste = PatientSchedules::where(
            'patient_schedules_start_sched',
            '>=',
            $schedDate
        )
        ->where(
            'patient_schedules_start_sched',
            '<=',
            $dt
        )
        ->get();

        dd($teste);
    }
}
