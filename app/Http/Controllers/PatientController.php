<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Services\PatientService;
use App\Http\Requests\PatientCreateRequest;
use App\Http\Requests\PatientUpdateRequest;


class PatientController extends Controller
{
    public function index()
    {
        $arPatient = PatientService::getAll();
        return view(
            'app/patients/index',
            compact('arPatient')
        );
    }

    public function getPatient(Request $request)
    {
        return response(
            PatientService::getFiltered($request->input()),
            200
        );
    }

    public function create()
    {
        return view('app/patients/create');
    }

    public function edit(int $id = null)
    {
        try {
            $arPatient = Patient::find($id);
            if (!$arPatient) {
                return back();
            }
            return view(
                'app/patients/edit',
                compact('arPatient')
            );
        } catch (\Throwable $th) {
            return redirect()
                ->route('patient.index')
                ->with('error', "O paciente selecionado não foi encontrado, o registro pode ter sido inativado, atualize a página e tente novamente.");
        }
    }

    public function update(PatientUpdateRequest $request)
    {
        try {
            $request->validated();
            PatientService::update($request);
            return redirect()
                ->route('patient.index')
                ->with('success', "Paciente {$request->patient_name} atualizado com sucesso!");
        } catch (\Throwable $th) {
            return redirect()
                ->route('patient.edit', $request->id)
                ->with('error', $th->getMessage());
        }
    }

    public function store(PatientCreateRequest $request)
    {
        try {
            $request->validated();
            PatientService::store($request);
            return redirect()
                ->route('patient.index')
                ->with('success', "Paciente {$request->patient_name} criado com sucesso!");
        } catch (\Throwable $th) {
            return redirect()
                ->route('patient.create')
                ->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            PatientService::destroy($id);
            return redirect()->route('patient.index')
                ->with('success', 'Paciente excluído com sucesso!');
        } catch (\Throwable $th) {
            return redirect()
                ->route('patient.index')
                ->with('error', $th->getMessage());
        }
    }
}
