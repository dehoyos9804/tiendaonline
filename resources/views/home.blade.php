@extends('templates.template')
@section('titulo', 'Admin | Tienda Online')

@section('menu')

  @if(Config::get('auth_tipo_user') == 'ADMINISTRADOR')
    @include('templates.menu')
  @elseif(Config::get('auth_tipo_user') == 'VENDEDOR')
    TEST :V
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
