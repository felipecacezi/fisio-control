<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
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
            'patient_name' => 'sometimes|string|max:500',
            'patient_sex' => 'sometimes|in:h,m',
            'patient_born_date' => 'sometimes|date',
            'patient_zip_code' => 'sometimes|string|max:8',
            'patient_street' => 'sometimes|string|max:500',
            'patient_district' => 'sometimes|string|max:500',
            'patient_city' => 'sometimes|string|max:500',
            'patient_state' => 'sometimes|string|max:2',
            'patient_country' => 'sometimes|string|max:500',
            'patient_rg' => 'sometimes|string',
            'patient_cpf' => 'sometimes|string',
            'patient_hma' => 'required|string',
            'patient_active' => 'sometimes|boolean',
        ];
    }
}
