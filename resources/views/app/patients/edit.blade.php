<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Paciente') }}
        </h2>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('patient.update') }}">
                        <input type="hidden"
                            name="id"
                            value="{{ $arPatient->id }}">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-white rounded-md">Gravar</button>
                            <a href="{{ route('patient.index') }}"
                                type="submit"
                                class="py-2 px-4 bg-red-500 text-white rounded-md">Cancelar</a>
                        </div>

                        <div class="flex flex-col">

                            <div class="mb-4">
                                <label for="patient_name"
                                    class="block text-sm font-medium text-gray-600">Nome do Paciente</label>
                                <input id="patient_name"
                                    type="text"
                                    name="patient_name"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_name') border-red-500 @enderror"
                                    maxlength="500"
                                    value="{{ $arPatient->patient_name }}"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo nome do paciente é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_sex"
                                    class="block text-sm font-medium text-gray-600">Sexo do Paciente</label>
                                <select id="patient_sex"
                                    name="patient_sex"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_sex') border-red-500 @enderror"
                                    required>
                                    <option value="h" {{ $arPatient->patient_sex == 'h' ? 'selected' : '' }}>Homem</option>
                                    <option value="m" {{ $arPatient->patient_sex == 'm' ? 'selected' : '' }}>Mulher</option>
                                </select>
                                @error('patient_sex')
                                    <p class="text-red-500 text-xs mt-1">O campo sexo é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_born_date"
                                    class="block text-sm font-medium text-gray-600">Nascimento</label>
                                <input id="patient_born_date"
                                    type="date"
                                    name="patient_born_date"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_born_date') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_born_date->format('Y-m-d') }}"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo nascimento é obrigatório</p>
                                @enderror
                            </div>


                            <div class="mb-4">
                                <label for="patient_zip_code"
                                    class="block text-sm font-medium text-gray-600">CEP</label>
                                <input id="patient_zip_code"
                                    type="text"
                                    name="patient_zip_code"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_zip_code') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_zip_code }}"
                                    maxlength="8"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo cep é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_street"
                                    class="block text-sm font-medium text-gray-600">Rua</label>
                                <input id="patient_street"
                                    type="text"
                                    name="patient_street"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_street') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_street }}"
                                    maxlength="500"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo rua é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_district"
                                    class="block text-sm font-medium text-gray-600">Bairro</label>
                                <input id="patient_district"
                                    type="text"
                                    name="patient_district" class="mt-1 p-2 w-full border rounded-md @error('patient_district') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_district }}"
                                    maxlength="500"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo bairro é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_city"
                                    class="block text-sm font-medium text-gray-600">Cidade</label>
                                <input id="patient_city"
                                    type="text"
                                    name="patient_city"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_city') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_city }}"
                                    maxlength="500"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo cidade é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_state"
                                    class="block text-sm font-medium text-gray-600">Estado</label>
                                <input id="patient_state"
                                    type="text"
                                    name="patient_state"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_state') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_state }}"
                                    maxlength="2"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo estado é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_country"
                                    class="block text-sm font-medium text-gray-600">País</label>
                                <input id="patient_country"
                                    type="text"
                                    name="patient_country"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_country') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_country }}"
                                    maxlength="500"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo país é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_rg"
                                    class="block text-sm font-medium text-gray-600">RG</label>
                                <input id="patient_rg"
                                    type="text"
                                    name="patient_rg"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_rg') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_rg }}"
                                    maxlength="10"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo rg é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_cpf"
                                    class="block text-sm font-medium text-gray-600">CPF</label>
                                <input id="patient_cpf"
                                    type="text"
                                    name="patient_cpf"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_cpf') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_cpf }}"
                                    maxlength="12"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo cpf é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_cpf"
                                    class="block text-sm font-medium text-gray-600">CPF</label>
                                <input id="patient_cpf"
                                    type="text"
                                    name="patient_cpf"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_cpf') border-red-500 @enderror"
                                    value="{{ $arPatient->patient_cpf }}"
                                    maxlength="12"
                                    required autofocus>
                                @error('patient_name')
                                    <p class="text-red-500 text-xs mt-1">O campo cpf é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_hma"
                                    class="block text-sm font-medium text-gray-600">HMA</label>
                                <textarea id="patient_hma"
                                    type="text"
                                    name="patient_hma"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_hma') border-red-500 @enderror"
                                    maxlength="12"
                                    required autofocus>{{ $arPatient->patient_hma }}</textarea>
                                @error('patient_hma')
                                    <p class="text-red-500 text-xs mt-1">O campo hma é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_personal_antecedents"
                                    class="block text-sm font-medium text-gray-600">Antecedentes pessoais</label>
                                <textarea id="patient_personal_antecedents"
                                    type="text"
                                    name="patient_personal_antecedents"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_personal_antecedents') border-red-500 @enderror"
                                    required autofocus>{{ $arPatient->patient_personal_antecedents }}</textarea>
                                @error('patient_personal_antecedents')
                                    <p class="text-red-500 text-xs mt-1">O campo antecedentes pessoais é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_drugs_in_use"
                                    class="block text-sm font-medium text-gray-600">Medicamentos em uso</label>
                                <textarea id="patient_drugs_in_use"
                                    type="text"
                                    name="patient_drugs_in_use"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_drugs_in_use') border-red-500 @enderror"
                                    required autofocus>{{ $arPatient->patient_drugs_in_use }}</textarea>
                                @error('patient_drugs_in_use')
                                    <p class="text-red-500 text-xs mt-1">O campo medicamentos em uso é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_active"
                                    class="block text-sm font-medium text-gray-600">Ativo</label>
                                <select id="patient_active"
                                    name="patient_active"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_active') border-red-500 @enderror"
                                    required>
                                    <option value="1" {{ old('patient_active') == 'h' ? 'selected' : '' }}>Ativo</option>
                                    <option value="0" {{ old('patient_active') == 'm' ? 'selected' : '' }}>Inativo</option>
                                </select>
                                @error('patient_active')
                                    <p class="text-red-500 text-xs mt-1">O campo ativo é obrigatório</p>
                                @enderror
                            </div>

                        </div>

                    </form>
                    @include('app/components/popup_alerts')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
