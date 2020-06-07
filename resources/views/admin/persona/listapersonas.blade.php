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
        <h3 class="breadcrumb-header">Vendedores</h3>
    </div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="breadcrumb-header">Lista de Vendedores</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        @foreach($personas as $persona)
                        <tbody>
                            <tr>
                                <td>{{ $persona->id }}</td>
                                <td>{{ $persona->nombre }} {{ $persona->apellido }}</td>
                                <td>{{ $persona->telefono }}</td>
                                <td>{{ $persona->direccion }}</td>
                                <td class="text-center">
                                <a href="{{route('admin.persona.editpersona',['id' => $persona->id])}}" class="btn btn-default btn-sm fa fa-edit">Edit</a>
                                <a href="{{route('admin.persona.deletepersona', ['id' => $persona->id])}}" class="btn btn-danger btn-sm fa fa-trash-o">Delete</a>
                                
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
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