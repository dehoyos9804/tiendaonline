

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
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Editar Proveedor</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" role="form" action="{{ route('admin.proveedor.updateproveedor', ['id' => $proveedor->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    {!! csrf_field() !!}
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">NIT</label>
                        <input type="text" value="{{($proveedor->nit)}}" class="form-control" name="nit" placeholder="NIT">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Razon Social</label>
                        <input type="text" value="{{($proveedor->razonsocial)}}" class="form-control" name="razonsocial" placeholder="Razon Social">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" value="{{($proveedor->telefono)}}" class="form-control" name="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Direccion</label>
                        <input type="text" value="{{($proveedor->direccion)}}" class="form-control" name="direccion" placeholder="Direccion">
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