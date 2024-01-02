<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agenda') }}
        </h2>
        <script src="{{ asset('vendor/fullcalendar/dist/index.global.min.js') }}"></script>
        <script src="{{ asset('vendor/fullcalendar/lang/locales-all.global.min.js') }}"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    @include('app/components/popup_alerts_js')
    <x-modal>
        <x-slot:modalId>newSchedModal</x-slot:modalId>
        <x-slot:title>Novo agendamento</x-slot:title>
        <x-slot:closeButtonId>closeNewEventModal</x-slot:closeButtonId>
        <x-slot:modalContent>

            <input type="hidden" name="sched_id" value=""/>

            <div class="mb-4">
                <label for="patient_name"
                    class="block text-sm font-medium text-gray-600">Nome do Paciente</label>
                <input id="patientAutoComplete"
                    type="text"
                    name="patient_name"
                    class="mt-1 p-2 w-full border rounded-md"
                    value="{{ old('patient_name') }}"
                    maxlength="500"
                    required autofocus>
                    <p id="patientError" class="text-red-500 text-xs mt-1 hidden">O campo nome do paciente é obrigatório</p>
            </div>

            <div class="mb-4">
                <label for="patient_schedules_start_sched"
                    class="block text-sm font-medium text-gray-600">Data/Hora Inicio</label>
                <input id="patient_schedules_start_sched"
                    type="datetime-local"
                    name="patient_schedules_start_sched"
                    class="mt-1 p-2 w-full border rounded-md"
                    value="{{ old('patient_schedules_start_sched') }}"
                    required autofocus>
                    <p id="schedDateError" class="text-red-500 text-xs mt-1 hidden">O campo data/hora inicio é obrigatório</p>
            </div>

            <x-slot:buttons>
                <button type="button"
                    id="btnTeste"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue">Gravar</button>
            </x-slot:buttons>
        </x-slot:modalContent>
    </x-modal>
    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
    @vite(
        [
            'resources/js/patientSchedule/index.js',
        ]
    )
</x-app-layout>
