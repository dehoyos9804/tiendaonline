

@extends('templates.template')
@section('titulo', 'Admin | Tienda Online')

@section('menu')
  @include('templates.menuadmin')
@endsection

@section('head-style-script')
    <!--Aqui los estilos y scripts en el head-->
@endsection
@section('contenido')

<div id="main-wrapper" style="width: 100%;margin-left: auto;margin-right: auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Editar Seccion</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" role="form" action="{{ route('admin.seccion.updateseccion', ['id' => $seccion->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    {!! csrf_field() !!}
                        <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Nombre Seccion</label>
                        <input type="text" value="{{($seccion->nombre)}}" class="form-control" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" value="{{($seccion->descripcion)}}" class="form-control" name="descripcion" placeholder="Descripcion">
                        </div>
                        <div class="form-group col-md-3">
                        <label for="exampleInputEmail1" style="visibility: hidden">boton</label><br>
                        <a href="{{ route('admin.seccion.listasecciones') }}" class="btn btn-default" id="btn-cancelar">Cancelar</a>
                        
                        <button type="submit" class="btn btn-primary">Editar</button>
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