<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Evolução') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('patientevolution.update') }}">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-white rounded-md">Gravar</button>
                            <a href="{{ route('patientevolution.index', $arPatient['patient_id']) }}"
                                type="submit"
                                class="py-2 px-4 bg-red-500 text-white rounded-md">Cancelar</a>
                        </div>

                        <input type="hidden" name="id" value="{{ $arPatient['id'] }}">
                        <input type="hidden" name="patient_id" value="{{ $arPatient['patient_id'] }}">
                        <div class="flex flex-col">

                            <div class="mb-4">
                                <label for="patient_evolution_date"
                                    class="block text-sm font-medium text-gray-600">Data</label>
                                <input id="patient_evolution_date"
                                    type="datetime-local"
                                    name="patient_evolution_date"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_evolution_date') border-red-500 @enderror"
                                    value="{{ $arPatient['patient_evolution_date'] }}"
                                    required autofocus>
                                @error('patient_evolution_date')
                                    <p class="text-red-500 text-xs mt-1">O campo data é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_evolution_description"
                                    class="block text-sm font-medium text-gray-600">Descrição</label>
                                <textarea id="patient_evolution_description"
                                    type="text"
                                    name="patient_evolution_description"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_evolution_description') border-red-500 @enderror"
                                    rows="15"
                                    required autofocus>{{ $arPatient['patient_evolution_description'] }}</textarea>
                                @error('patient_evolution_description')
                                    <p class="text-red-500 text-xs mt-1">O campo descrição em uso é obrigatório</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="patient_evolution_active"
                                    class="block text-sm font-medium text-gray-600">Ativo</label>
                                <select id="patient_evolution_active"
                                    name="patient_evolution_active"
                                    class="mt-1 p-2 w-full border rounded-md @error('patient_evolution_active') border-red-500 @enderror"
                                    >
                                    <option value="1" {{ $arPatient['patient_evolution_active'] == 'h' ? 'selected' : '' }}>Ativo</option>
                                    <option value="0" {{ $arPatient['patient_evolution_active'] == 'm' ? 'selected' : '' }}>Inativo</option>
                                </select>
                                @error('patient_evolution_active')
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
