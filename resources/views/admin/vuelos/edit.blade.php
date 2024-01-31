@extends('layouts.app')

@section('contenido')
    @if (session('created'))
        <script>
            Swal.fire({
                title: "Registro exitoso!",
                html: 'Tu vuelo fue registrado correctamente',
                icon: "success"
            });
        </script>
    @endif

    <div class="flex flex-col items-center">
        <div class="flex items-center justify-between py-4 bg-spring-200 shadow w-full px-6 mb-10">
            <h2 class="text-lg">Editar vuelo - {{ $vuelo[0]->codigo }}</h2>
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-1 bg-info hover:bg-info-800 cursor-pointer rounded-lg text-white text-sm font-semibold px-4 py-2"
                type="button">
                Volver
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
            </a>
        </div>
        <form action="{{ route('update.vuelo') }}" method="POST" class="w-full px-10" autocomplete="off">
            @csrf
            <input type="hidden" name="id" value="{{ $vuelo[0]->id }}">
            <div class="grid gap-6 mb-6 md:grid-cols-3">
                <div>
                </div>
                <div>
                    <label for="aerolinea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Aerolinea
                    </label>
                    <select id="aerolinea" name="aerolinea"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
                        <option class="text-base" value="">--Seleccione una opcion--</option>
                        @foreach ($aerolineas as $aerolinea)
                            <option class="text-base" value="{{ $aerolinea->id }}" {{ $aerolinea->id == $vuelo[0]->aerolinea_id ? 'selected' : ''}}> {{ $aerolinea->name }}</option>
                        @endforeach
                    </select>
                    @error('aerolinea')
                        <p
                            class="flex mt-1 items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="destino" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Destino
                    </label>
                    <select id="destino" name="destino"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
                        <option class="text-base" value="">--Seleccione una opcion--</option>
                        @foreach ($destinos as $destino)
                            <option class="text-base" value="{{ $destino->id }}" {{ $destino->id == $vuelo[0]->destino_id ? 'selected' : '' }}> {{ $destino->name }} -
                                ({{ $destino->codigo }})
                            </option>
                        @endforeach
                    </select>
                    @error('destino')
                        <p
                            class="flex mt-1 items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="sala" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Sala de abordaje
                    </label>
                    <input type="text" id="sala" name="sala" value="{{ $vuelo[0]->sala}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('sala')
                        <p
                            class="flex mt-1 items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="hora_salida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Hora salida
                    </label>
                    <input type="time" id="hora_salida" name="hora_salida" value=" {{ $vuelo[0]->hora_salida }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('hora_salida')
                        <p
                            class="flex mt-1 items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="hora_llegada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Hora llegada
                    </label>
                    <input type="time" id="hora_llegada" name="hora_llegada"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('hora_llegada')
                        <p
                            class="flex mt-1 items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <x-primary-button>
                {{ __('Actualizar') }}
            </x-primary-button>
        </form>
    </div>
@endsection
