@extends('layouts.app')

@section('titulo')
    Inicia sesión en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="imagen de registro">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Tu email de registro"
                        class="@error('email') border-red-500 @enderror border p-3 w-full rounded-xl"
                        value="{{ old('email') }}">
                </div>

                @error('email')
                    <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">
                        Contraseña
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu contraseña de registro"
                        class="@error('password') border-red-500 @enderror border p-3 w-full rounded-xl">
                </div>

                @error('password')
                    <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-2 flex justify-content-left align-items-center gap-1">
                    <input type="checkbox" name="remember">
                    <label for="remember" class="text-gray-600 font-normal text-sm">Mantener mi sesion abierta</label>
                </div>

                <input type="submit" value="Iniciar seción"
                    class="uppercase p-3 bg-sky-600 transition-colors hover:bg-sky-700 cursor-pointer font-bold w-full text-white rounded-lg" />

            </form>
        </div>

    </div>
@endsection
