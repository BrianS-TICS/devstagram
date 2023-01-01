@extends('layouts.app')

@section('titulo')
    Editar perfil : {{ auth()->user()->username }}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form enctype="multipart/form-data" method="POST" action="{{ route('perfil.store') }}" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
                        class="@error('username') border-red-500 @enderror border p-3 w-full rounded-xl"
                        value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-400 rounded-lg text-white font-semibold my-5 text-sm p-3 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-600 font-bold">
                        Imagen de perfil
                    </label>
                    <input id="imagen" name="imagen" accept=".jpg, .png, .jpeg " type="file">

                </div>

                <input type="submit" value="Actualizar perfil"
                    class="uppercase p-3 bg-sky-600 transition-colors hover:bg-sky-700 cursor-pointer font-bold w-full text-white rounded-lg" />
            </form>
        </div>
    </div>
@endsection
