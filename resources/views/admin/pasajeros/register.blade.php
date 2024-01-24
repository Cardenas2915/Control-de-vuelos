@extends('layouts.app')

@section('contenido')
    @if (session('delete'))
        <script>
            Swal.fire({
                title: "Proceso realizado!",
                html: `El destino se elimino correctamente!`,
                icon: "success"
            });
        </script>
    @endif


    <div class="flex flex-col items-center">
        <div class="flex items-center justify-between py-4 bg-spring-200 shadow w-full px-6 mb-10">
            <h2 class="text-lg">Crear pasajero - Formulario de registro</h2>
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
        <form class="w-full px-10" autocomplete="off" action="{{ route('pasajero.register')}}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-3">
                <div>
                    <label for="identificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Identificacion
                    </label>
                    <input type="text" id="identificacion" name="identificacion"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @error('identificacion')
                        <p
                            class="flex mt-1 items-center p-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @error('name')
                        <p
                            class="flex mt-1 items-center p-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Apellidos
                    </label>
                    <input type="text" id="last_name" name="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @error('last_name')
                        <p
                            class="flex mt-1 items-center p-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                    </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @error('email')
                        <p
                            class="flex mt-1 items-center p-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                    </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Telefono
                    </label>
                    <input type="tel" id="phone" name="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @error('phone')
                        <p
                            class="flex mt-1 items-center p-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                    </div>
                <div>
                    <label for="vuelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Vuelo
                    </label>
                    <select id="vuelo" name="vuelo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
                        <option class="text-base" value="">--Seleccione una opcion--</option>
                        @foreach ($vuelos as $vuelo)
                            <option class="text-base text-black" value="{{ $vuelo->id }}"> {{ $vuelo->codigo }}</option>
                        @endforeach
                    </select>
                    @error('vuelo')
                        <p
                            class="flex mt-1 items-center p-2 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                        Foto perfil del pasajero
                    </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none "
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                        800x400px).</p>
                </div>
            </div>
            <x-primary-button>
                {{ __('Registrar') }}
            </x-primary-button>
        </form>
    </div>
@endsection
