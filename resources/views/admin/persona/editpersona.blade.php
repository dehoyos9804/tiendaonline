

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
                    <h4 class="panel-title">Editar Cliente</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" role="form" action="{{ route('admin.persona.updatepersona', ['id' => $persona->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    {!! csrf_field() !!}
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" value="{{($persona->nombre)}}" class="form-control" name="nombre">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" value="{{($persona->apellido)}}" class="form-control" name="apellido">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" value="{{($persona->telefono)}}" class="form-control" name="telefono">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Direccion</label>
                        <input type="text" value="{{($persona->direccion)}}" class="form-control" name="direccion">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Tipo de Usuario</label>
                        <select class="form-control" name="tipousuario" id="tipousuario" data-live-search="true">
                            <!-- <option value="0">Seleccione</option> -->
                            @foreach($vartipousuario as $tipos)
                                @if ($persona->tipousuario_id==$tipos->id)
                                    <option value="{{$tipos->id}}" selected>{{$tipos->nombre}}</option>
                                @else
                                    <option value="{{$tipos->id}}">{{$tipos->nombre}}</option>
                                @endif
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