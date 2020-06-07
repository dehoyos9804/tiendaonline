

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

<div id="main-wrapper">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Editar Proveedor</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" role="form" action="{{ route('admin.seccion.updateseccion', ['id' => $seccion->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    {!! csrf_field() !!}
                        <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">Nombre Seccion</label>
                        <input type="text" value="{{($seccion->nombre)}}" class="form-control" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" value="{{($seccion->descripcion)}}" class="form-control" name="descripcion" placeholder="Descripcion">
                        </div>
                        <div class="form-group col-md-8">
                        <label for="exampleInputEmail1" style="visibility: hidden">boton</label>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('boby-script')
    <!--Aqui los scripts en el body-->
@endsection