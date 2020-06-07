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
        <h3 class="breadcrumb-header">Secciones</h3>
    </div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="breadcrumb-header col-md-10">Lista Secciones</h4>
                    <a href="{{ route('admin.seccion.createseccion') }}" class="btn btn-sm btn-default btn-addon col-md-2"><i class="glyphicon glyphicon-plus"></i>Nueva Seccion</a>
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        @foreach($secciones as $seccion)
                        <tbody>
                            <tr>
                                <td>{{ $seccion->id }}</td>
                                <td>{{ $seccion->nombre }}</td>
                                <td>{{ $seccion->descripcion }}</td>
                                <td class="text-center">
                                <a href="{{route('admin.seccion.editseccion',['id' => $seccion->id])}}" class="btn btn-default btn-sm fa fa-edit">Edit</a>
                                <a href="{{route('admin.seccion.deleteseccion', ['id' => $seccion->id])}}" class="btn btn-danger btn-sm fa fa-trash-o">Delete</a>
                            
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