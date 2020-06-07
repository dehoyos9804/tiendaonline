

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
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Precio Compra</label>
                        <input type="text" value="{{($producto->preciocompra)}}" class="form-control" name="preciocompra">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Precio Venta</label>
                        <input type="text" value="{{($producto->precioventa)}}" class="form-control" name="precioventa">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Cantidad</label>
                        <input type="text" value="{{($producto->cantidad)}}" class="form-control" name="cantidad">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Estado</label>
                            <select style="margin-bottom:15px;" value="{{$producto->estado}}" name="estado" class="form-control" require>
                                <option>seleccione</option>
                                <option>ACTIVO</option>
                                <option>INACTIVO</option>
                            </select>
                        </div>                
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Seccion</label>
                        <select class="form-control select" name="secciones_id" id="secciones_id" data-live-search="true" require>
                            <option value="0" selected>seleccione</option>
                            @foreach($varseccion as $seccion)
                                <option value="{{$seccion->id}}">{{$seccion->nombre}}</option>
                            @endforeach
                        </select>
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