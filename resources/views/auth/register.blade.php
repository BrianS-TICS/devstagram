@extends('layouts.app')

@section('titulo')
    Registrate en devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="imagen de registro">
        </div>

        <h3>Hola</h3>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">
                        Nombre
                    </label>
                    <input id="name" name="name" type="text" placeholder="Tu nombre"
                        class="@error('name') border-red-500 @enderror border p-3 w-full rounded-xl"
                        value="{{ old('name') }}">
                </div>

                @error('name')
                    <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
                        class="@error('username') border-red-500 @enderror border p-3 w-full rounded-xl"
                        value="{{ old('username') }}">
                </div>

                @error('username')
                    <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                        {{ $message }}
                    </p>
                @enderror

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
                        class="@error('password') border-red-500 @enderror border p-3 w-full rounded-xl"
                        >
                </div>

                @error('password')
                    <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold">
                        Repetir contraseña
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Tu repetir contraseña de registro"
                        class="border p-3 w-full rounded-xl"
                        >
                </div>

                <input type="submit" value="Crear cuenta"
                    class="uppercase p-3 bg-sky-600 transition-colors hover:bg-sky-700 cursor-pointer font-bold w-full text-white rounded-lg" />

            </form>
        </div>

    </div>
@endsection
