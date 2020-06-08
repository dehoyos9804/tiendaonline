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
        <h3 class="breadcrumb-header">Compras</h3>
    </div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="breadcrumb-header col-md-10">Lista de Compras Generales</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>total</th>
                                    <th>Proveedor</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($compras as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->fecha }}</td>
                                        <td>{{ $key->total }}</td>
                                        <td>{{ $key->proveedor->nit }} - {{ $key->proveedor->razonsocial }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('reporte.compra.download',['id'=>$key->id])}}" class="btn btn-danger btn-sm fa fa-file-pdf-o"></a>
                                            <a href="{{ route('reporte.compra',['id'=>$key->id])}}" class="btn btn-info btn-sm fa fa-eye"></a>
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