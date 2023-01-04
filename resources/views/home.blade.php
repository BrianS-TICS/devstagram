@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    {{-- * Se hace uso de un componente para el listado de posts--}}
    <x-listar-post :posts="$posts" />
@endsection
