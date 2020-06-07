@extends('templates.template')
@section('titulo', 'Admin | Tienda Online')

@section('menu')

  @if($user_auth->tipousuario->nombre == 'ADMINISTRADOR')
    @include('templates.menuadmin')
  @elseif($user_auth->tipousuario->nombre == 'VENDEDOR')
    @include('templates.menu')
  @endif

@endsection

@section('head-style-script')
    <!--Aqui los estilos y scripts en el head-->
@endsection
@section('contenido')

@endsection
@section('boby-script')
    <!--Aqui los scripts en el body-->
@endsection
