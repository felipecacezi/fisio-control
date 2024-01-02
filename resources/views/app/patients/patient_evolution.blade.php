<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evolução') }}
            {{ ' - '.$arPatient->patient_name }}
        </h2>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-4">
                        <a href="{{ route('patientevolution.create', $arPatient->id) }}"
                            class="py-2 px-4 bg-blue-500 text-white rounded-md">Novo</a>
                    </div>

                    <div class="flex">
                        <table class="w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b text-center">#</th>
                                    <th class="py-2 px-4 border-b text-center">Data</th>
                                    <th class="py-2 px-4 border-b text-center">Resumo</th>
                                    <th class="py-2 px-4 border-b"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arPatientEvolutions as $evolution)
                                <form action="{{ route('patientevolution.destroy', [$evolution['id'], $arPatient->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center">{{ $evolution['id'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ \Carbon\Carbon::parse($evolution['patient_evolution_date'])->format('d/m/Y')}}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ substr($evolution['patient_evolution_description'], 0, 50) }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            <a href="{{ route('patientevolution.edit', $evolution['id']) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button type="submit">
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
