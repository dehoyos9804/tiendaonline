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
        <h3 class="breadcrumb-header">Productos</h3>
    </div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="breadcrumb-header col-md-10">Lista de productos</h4>
                    <a href="{{ route('admin.producto.createproducto') }}" class="btn btn-sm btn-default btn-addon col-md-2"><i class="glyphicon glyphicon-plus"></i>Registrar Producto</a>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>
                                            <div class="lightgallery">
                                                <a href="/storage/{{$producto->img}}">
                                                    <img src='/storage/{{$producto->img}}' alt="imagen producto" style="head:32px; width:32px;">
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->marca }}</td>
                                        <td>{{ $producto->preciocompra }}</td>
                                        <td>{{ $producto->precioventa }}</td>
                                        <td>{{ $producto->cantidad }}</td>
                                        <td>{{ $producto->estado }}</td>
                                        <td class="text-center">
                                        <a href="{{route('admin.producto.editproducto',['id' => $producto->id])}}" class="btn btn-default btn-sm fa fa-edit">Edit</a>
                                        <a href="{{route('admin.producto.deleteproducto', ['id' => $producto->id])}}" class="btn btn-danger btn-sm fa fa-trash-o">Delete</a>
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