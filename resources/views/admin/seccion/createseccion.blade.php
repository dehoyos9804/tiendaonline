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
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Registrar Seccion</h4>
                </div>
                <div class="panel-body">
                    <form class="form" method="POST" action="{{ route('admin.seccion.storeseccion') }}">
                    {!! csrf_field() !!}
                        <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="textarea" class="form-control" name="descripcion" placeholder="Descripcion">
                        </div>
                        
                        <div class="form-group col-md-2">
                        <label for="exampleInputEmail1" style="visibility: hidden">boton</label>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
</div>

@endsection
@section('boby-script')
    <!--Aqui los scripts en el body-->
@endsection