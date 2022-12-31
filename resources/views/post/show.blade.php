@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen de post {{ $post->titulo }}">
            <div class="p-3 flex items-center gap-2">
                @auth
                    @if ($post->checkLike(auth()->user()))
                        <form method="POST" action="{{ route('posts.likes.destroy', $post) }}" class="mt-1">
                            @csrf
                            @method("DELETE")
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <form method="POST" action="{{ route('posts.likes.store', $post) }}" class="mt-1">
                            @csrf
                            <div class="my-4">
                                <button type="submit" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif

                @endauth
                <p class="font-bold"> {{ $post->likes->count() }} <span class="font-normal">Likes</span></p>
            </div>
            <div class="p-3">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id )
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            class="bg-red-500 uppercase p-3 mt-4 hover:bg-red-600 text-white rounded-md font-bold cursor-pointer"
                            value="Eliminar publicación"
                            >
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 px-5">
            <div class="p-5 shadow-md bg-white">
                @auth
                    <p class="text-xl font-black p-2 text-center uppercase ">Agrega un nuevo comentario</p>
                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-md mb-5 mt-3 text-white text-center font-bold">
                            {{session('mensaje')}}
                        </div>
                    @endif
                    <form class="mb-5" action="{{ route('comentarios.store',['post'=>$post, 'user'=>$user ]), }} " method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-600 font-bold">
                                Comentario
                            </label>
                            <textarea name="comentario" id="comentario" placeholder="Agrega un comentario"
                                class="@error('comentario') border-red-500 @enderror border p-3 w-full rounded-xl"></textarea>
                            @error('comentario')
                                <p class="bg-red-400 rounded-lg text-white font-semibold mb-5 text-sm p-3 text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <input type="submit" value="Comentar"
                            class="uppercase p-3 bg-sky-600 transition-colors hover:bg-sky-700 cursor-pointer font-bold w-full text-white rounded-lg" />
                    </form>
                @endauth
                @guest
                    <p class="text-xl py-2 uppercase font-black text-center">Comentarios</p>
                @endguest
                <div class="bg-white shadow-sm max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                    @foreach ( $post->comentarios as $comentario )
                    <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-semibold text-sky-600">{{$comentario->user->username}}</a>
                                <p>{{$comentario->comentario}}</p>
                                <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-600 font-bold p-10 text-center">No hay comentarios aún</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
