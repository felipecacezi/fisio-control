<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientCreateRequest extends FormRequest
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
            'patient_name' => 'required|string|max:500',
            'patient_sex' => 'required|in:h,m',
            'patient_born_date' => 'required|date',
            'patient_zip_code' => 'required|string|max:8',
            'patient_street' => 'required|string|max:500',
            'patient_district' => 'required|string|max:500',
            'patient_city' => 'required|string|max:500',
            'patient_state' => 'required|string|max:2',
            'patient_country' => 'required|string|max:500',
            'patient_rg' => 'required|string',
            'patient_cpf' => 'required|string',
            'patient_hma' => 'required|string',
            'patient_active' => 'sometimes|boolean',
        ];
    }
}
