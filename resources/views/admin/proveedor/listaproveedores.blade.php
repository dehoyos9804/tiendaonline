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

<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Proveedores</h3>
    </div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="breadcrumb-header col-md-10">Lista de proveedores</h4>
                    <a href="{{ route('admin.proveedor.createproveedor') }}" class="btn btn-sm btn-default btn-addon col-md-2"><i class="glyphicon glyphicon-plus"></i>Registrar Proveedor</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>NIT</th>
                                    <th>Razon Social</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($proveedores as $proveedor)
                                    <tr>
                                        <td>{{ $proveedor->id }}</td>
                                        <td>{{ $proveedor->nit }}</td>
                                        <td>{{ $proveedor->razonsocial }}</td>
                                        <td>{{ $proveedor->telefono }}</td>
                                        <td>{{ $proveedor->direccion }}</td>
                                        <td class="text-center">
                                        <a href="{{route('admin.proveedor.editproveedor',['id' => $proveedor->id])}}" class="btn btn-default btn-sm fa fa-edit">Edit</a>
                                        <a href="{{route('admin.proveedor.deleteproveedor', ['id' => $proveedor->id])}}" class="btn btn-danger btn-sm fa fa-trash-o">Delete</a>
                                    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('boby-script')
    <!--Aqui los scripts en el body-->
@endsection