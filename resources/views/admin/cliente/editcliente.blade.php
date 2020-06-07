

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
                    <h4 class="panel-title">Editar Cliente</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" role="form" action="{{ route('admin.cliente.updatecliente', ['id' => $cliente->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    {!! csrf_field() !!}
                        <div class="form-group">
                        <label for="exampleInputEmail1">Identificacion</label>
                        <input type="text" value="{{($cliente->identificacion)}}" class="form-control" name="identificacion">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" value="{{($cliente->nombre)}}" class="form-control" name="nombre">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" value="{{($cliente->apellido)}}" class="form-control" name="apellido">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" value="{{($cliente->telefono)}}" class="form-control" name="telefono">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Direccion</label>
                        <input type="text" value="{{($cliente->direccion)}}" class="form-control" name="direccion">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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