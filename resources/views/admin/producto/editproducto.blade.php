

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

<div id="main-wrapper" style="width: 75%;margin-left: auto;margin-right: auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Editar Productos</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" role="form" action="{{ route('admin.producto.updateproducto', ['id' => $producto->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    {!! csrf_field() !!}
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" value="{{($producto->nombre)}}" class="form-control" name="nombre">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Marca</label>
                        <input type="text" value="{{($producto->marca)}}" class="form-control" name="marca">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Precio Compra</label>
                        <input type="number" value="{{($producto->preciocompra)}}" class="form-control" name="preciocompra">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Precio Venta</label>
                        <input type="number" value="{{($producto->precioventa)}}" class="form-control" name="precioventa">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Estado</label>
                            <select style="margin-bottom:15px;" name="estado" class="form-control" require>
                                @if($producto->estado=='ACTIVO')
                                    <option value="ACTIVO" selected>ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                @endif
                                @if($producto->estado=='INACTIVO')
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO" selected>INACTIVO</option>
                                @endif
                            </select>
                        </div>                
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Seccion</label>
                        <select class="form-control select" name="seccion_" id="seccion_" data-live-search="true" require>
                        @foreach($varseccion as $seccion)
                                @if ($seccion->id==$producto->seccion_id)
                                    <option value="{{$seccion->id}}" selected>{{$seccion->nombre}}</option>
                                @else
                                    <option value="{{$seccion->id}}">{{$seccion->nombre}}</option>
                                @endif 
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-8"></div>
                        <a href="{{ route('admin.producto.listaproductos') }}" class="btn btn-default" id="btn-cancelar">Cancelar</a>
                        
                        <button type="submit" class="btn btn-primary">Editar</button>
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