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
                    <h4 class="panel-title">Registrar Vendedor</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.persona.storepersona') }}">
                    {!! csrf_field() !!}
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="E-mail">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Direccion</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Direccion">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Tipo de Usuario</label>
                        <select class="form-control select" name="tipousuario_id" id="tipousuario_id" data-live-search="true">
                            <option value="0" selected>seleccione</option>
                            @foreach($vartipousuario as $tipos)
                                <option value="{{$tipos->id}}">{{$tipos->nombre}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-8"></div>
                        <a href="{{ route('admin.persona.listapersonas') }}" class="btn btn-default" id="btn-cancelar">Cancelar</a>
                        
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