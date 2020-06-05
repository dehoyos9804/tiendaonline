@extends('templates.template')
@section('titulo', 'Admin | Tienda Online')

@section('menu')
  @include('templates.menuadmin')
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
                    <h4 class="panel-title">Registrar Cliente</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.cliente.storecliente') }}">
                    {!! csrf_field() !!}
                        <div class="form-group">
                        <label for="exampleInputEmail1">Identificacion</label>
                        <input type="text" class="form-control" name="identificacion" placeholder="Identificacion">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Direccion</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Direccion">
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