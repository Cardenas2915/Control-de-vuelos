@extends('layouts.app')

@section('contenido')
    <section class=" flex flex-col items-center mt-10 px-20">
        <p class="text-2xl font-bold mb-10">Datos del vuelo</p>
        <div class="grid grid-cols-2 gap-12 lg:gap-24 lg:grid-cols-4 ">

            @if ($pasajeros->count() > 0)
                @foreach ($pasajeros as $pasajero)
                    <div class="sm:flex lg:items-start group">
                        <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
                            <img class="w-full rounded-md sm:h-32 sm:w-32 object-cover"
                                src="{{ asset('user/' . $pasajero->foto) }}" alt="text">
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">{{ $pasajero->identificacion }}</span>
                            <p class="mt-3 text-lg font-medium leading-6">
                                {{ $pasajero->name }} {{ $pasajero->last_name }}
                            </p>
                            <span class="text-sm text-gray-800">{{ $pasajero->telefono }}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-800 font-bold">No hay pasajeros asignados en este vuelo</p>
            @endif

        </div>
    </section>
@endsection
