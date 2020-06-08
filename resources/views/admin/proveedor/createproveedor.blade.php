@extends('templates.template')
@section('titulo', 'Admin | Tienda Online')

@section('menu')
  @include('templates.menuadmin')
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
                    <h4 class="panel-title">Registrar Proveedor</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.proveedor.storeproveedor') }}">
                    {!! csrf_field() !!}
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">NIT</label>
                        <input type="text" class="form-control" name="nit" placeholder="NIT">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Razon Social</label>
                        <input type="text" class="form-control" name="razonsocial" placeholder="Razon Social">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Direccion</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Direccion">
                        </div>
                        <div class="col-md-8"></div>
                        <a href="{{ route('admin.proveedor.listaproveedores') }}" class="btn btn-default" id="btn-cancelar">Cancelar</a>
                        
                        <button type="submit" class="btn btn-primary">Guardar</button>
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