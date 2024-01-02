<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientEvolution;
use App\Http\Requests\PatientUpdateRequest;
use App\Http\Requests\PatientEvolutionCreateRequest;
use App\Http\Requests\PatientEvolutionUpdateRequest;

class PatientEvolutionController extends Controller
{
    public function index($id = null)
    {
        $arPatient = Patient::find($id);
        $arPatientEvolutions = PatientEvolution::where(
            'patient_id',
            '=',
            $id
        )->where(
            'patient_evolution_active',
            '=',
            1
        )->get()->toArray();
        return view(
            'app/patients/patient_evolution',
            compact(
                'arPatient',
                'arPatientEvolutions'
            )
        );
    }

    public function create($id = null)
    {
        return view(
            'app/patients/patient_evolution_create',
            compact('id')
        );
    }

    public function store(PatientEvolutionCreateRequest $request)
    {
        try {
            $request->validated();
            PatientEvolution::create($request->all());
            return redirect()
                ->route(
                    'patientevolution.index',
                    $request->patient_id
                )
                ->with('success', "Evolução gravada com sucesso");
        } catch (\Throwable $th) {
            return redirect()
                ->route('patientevolution.create')
                ->with('error', "Ocorreu um problema ao gravar a nova evolução");
        }
    }

    public function edit(int $id = null)
    {
        $arPatient = PatientEvolution::find($id);
        return view(
            'app/patients/patient_evolution_edit',
            compact('arPatient')
        );
    }

    public function update(PatientEvolutionUpdateRequest $request)
    {
        try {
            $request->validated();
            $patientEvolution = PatientEvolution::findOrFail($request->id);
            $patientEvolution->update($request->all());
            return redirect()
                ->route('patientevolution.index', $request->patient_id)
                ->with('success', "Evolução atualizada com sucesso!");
        } catch (\Throwable $th) {
            return redirect()
                ->route('patient.edit', $request->id)
                ->with('error', "Ocorreu um problema ao alterar evolução, entre em contato com o suporte.");
        }
    }

    public function destroy($id, $patient_id)
    {
        try {
            $patientEvolution = PatientEvolution::findOrFail($id);
            $patientEvolution->update([
                'patient_evolution_active' => 0
            ]);
            return redirect()->route('patientevolution.index', $patient_id)
                ->with('success', 'Evolução excluída com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()
                ->route('patientevolution.index', $patient_id)
                ->with('error', "Ocorreu um problema ao inativar a evolução selecionada, entre em contato com o suporte.");
        }
    }

}
