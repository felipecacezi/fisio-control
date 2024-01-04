<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientSchedules;
use Illuminate\Http\Request;
use App\Http\Services\ScheduleService;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('app/schedule/index');
    }

    public function getEvents($id = null)
    {
        $eventsSql = PatientSchedules::select(
            'patient_schedules.id  as schedule_id',
            'patient_schedules.patient_schedules_start_sched',
            'patients.patient_name',
            'patients.id as patient_id'
        )->where(
            'patient_schedules_active',
            '=',
            1
        )->join(
            'patients',
            'patients.id',
            '=',
            'patient_schedules.patient_id'
        );

        if ($id) {
            $eventsSql->where(
                'patient_schedules.id',
                '=',
                $id
            );
        }

        $events = $eventsSql->get()->toArray();
        $arEventsReturn = [];

        foreach ($events as $key => $value) {
            array_push($arEventsReturn, [
                'id' => $value['schedule_id'],
                'patient_id' => $value['patient_id'],
                'title' => $value['patient_name'],
                'start' => $value['patient_schedules_start_sched'],
                'allDay' => false,
                'backgroundColor' => '#3252a8',
            ]);
        }

        return response(
            $arEventsReturn,
            200
        );
    }

    public function store(Request $request)
    {
        try {
            PatientSchedules::create($request->all());
            return response(
                'Agendamento feito com sucesso',
                200
            );
        } catch (\Throwable $th) {
            return response(
                $th->getMessage(),
                500
            );
        }
    }

    public function edit(Request $request)
    {
        try {
            $schedule = PatientSchedules::findOrFail($request->id);

            if (!$schedule) {
                return response(
                    'Agendamento não encontrado',
                    400
                );
            }

            $schedule->update($request->all());

            return response(
                "Agendamento alterado com sucesso",
                200
            );
        } catch (\Throwable $th) {
            return response(
                $th->getMessage(),
                500
            );
        }
    }

}
