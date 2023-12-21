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

                    <div class="mb-4">
                        <a href="{{ route('patient.create') }}"
                            class="py-2 px-4 bg-blue-500 text-white rounded-md">Novo Paciente</a>
                    </div>

                    <div class="flex">
                        <table class="w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b text-center">#</th>
                                    <th class="py-2 px-4 border-b text-center">Nome</th>
                                    <th class="py-2 px-4 border-b text-center">Endereço</th>
                                    <th class="py-2 px-4 border-b"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arPatient as $patient)
                                <form action="/patient/{{ $patient->id }}/destroy" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center">{{ $patient->id }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $patient->patient_name }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $patient->patient_street }}</td>
                                        <td class="py-2 px-4 border-b text-right">
                                            <a href="{{ route('patient.edit', $patient->id) }}"
                                                class="">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button type="submit"
                                                class="">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('app/components/popup_alerts')
</x-app-layout>
