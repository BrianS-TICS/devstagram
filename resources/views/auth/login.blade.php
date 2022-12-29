@extends('layouts.app')

@push('scripts')
    <script type="module" src="{{ asset('js/helperShowPassword.js') }}"></script>
@endpush

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
                    <div class="flex gap-2">
                        <input id="password" name="password" type="password" placeholder="Tu contraseña de registro"
                            class="@error('password') border-red-500 @enderror border p-3 w-full rounded-xl">
                        <button class="border rounded-xl p-3 hover:bg-slate-50" type="button" id="btnShowPassword" class="">
                            <svg id="svgEyeClose" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="#9f9fa3" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
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
