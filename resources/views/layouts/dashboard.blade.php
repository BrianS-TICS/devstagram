@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario">
            </div>
            <div
                class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:items-start py-10 md:py-0 md:justify-center md:gap-1">
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

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        @if ($posts->count() > 0)
            <div class="grid md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show',['post'=>$post, 'user'=>$user ]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->imagen }}"
                                alt="imagen del post {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones</p>

        @endif

    </section>
@endsection
