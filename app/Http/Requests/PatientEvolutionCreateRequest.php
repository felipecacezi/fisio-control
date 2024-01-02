<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientEvolutionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Pode ser ajustado conforme suas regras de autorização
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_id' => 'required',
            'patient_evolution_date' => 'required|date',
            'patient_evolution_description' => 'required|max:5000',
            'patient_evolution_active' => 'required'
        ];
    }
}
