@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen de post {{ $post->titulo }}">
            <div class="p-3">
                <p> 0 Likes</p>
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
