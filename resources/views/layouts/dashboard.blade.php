@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:items-start py-10 md:py-0 md:justify-center md:gap-1">
                <p class="text-gray-700 text-2xl capitalize">{{ $user->username }}</p>
                <p class="text-gray-800 text-sm mb-1 font-bold mt-4">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-1 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-1 font-bold">
                    0
                    <span class="font-normal">Publicaciones</span>
                </p>
            </div>
        </div>
        <div>
        </div>
    </div>
@endsection

