@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('scripts')
    @vite('resources/js/app.js')
@endpush

@section('titulo')
    Crea una nueva publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form id="dropzone"
            class="dropzone border-dashed border-2 w-full h-96 rounded-md flex flex-col justify-center items-center"
            method="POST" enctype="multipart/form-data" action="{{ route('imagen.store') }}">
            @csrf
            </form>
        </div>
        <div class="md:w-1/2 bg-white p-10 rounded-lg shadow-md mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-600 font-bold">
                        Titulo
                    </label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo de la publicación"
                        class="@error('titulo') border-red-500 @enderror border p-3 w-full rounded-xl"
                        value="{{ old('titulo') }}">
                </div>

                @error('titulo')
                    <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-600 font-bold">
                        Descripcion
                    </label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la publicacion"
                        class="@error('titulo') border-red-500 @enderror border p-3 w-full rounded-xl">{{ old('descripcion') }}</textarea>
                </div>

                @error('descripcion')
                    <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                        {{ $message }}
                    </p>
                @enderror

                <input type="submit" value="Crear publicacion"
                    class="uppercase p-3 bg-sky-600 transition-colors hover:bg-sky-700 cursor-pointer font-bold w-full text-white rounded-lg" />
            </form>
        </div>
    </div>
@endsection
