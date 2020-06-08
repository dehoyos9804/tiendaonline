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
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Registro de Venta</h3>
            </div>
            <input type="hidden" id="isGuardado" value="{{$isGuardado}}">

            <div class="panel-body user-profile-panel">
                <form method="POST" action="{{ route('venta.store') }}">
                    {!! csrf_field() !!}
                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title text-left">Datos de la facturación</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="fecha">Fecha venta</label>
                                    <div style="margin-bottom:15px;" class="input-group">
                                        <span class="input-group-addon" id="icon"><i class="fa fa-calendar"></i></span>
                                        <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title text-left">Datos del Cliente</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="fecha">Cliente</label>
                                    <!--<select class="form-control search-select">
                                    </select>-->
                                    <div style="margin-bottom:15px;" class="input-group">
                                        <span class="input-group-addon" id="icon"><i class="fa fa-calendar"></i></span>
                                        <select class="form-control search-select" name="cliente" id="cliente" required>
                                            @foreach($clientes as $key)
                                                <option value="{{$key->id}}">{{$key->identificacion}} - {{$key->nombre}} {{$key->apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title text-left">Datos del Vendedor</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="fecha">Vendedor</label>
                                    <!--<select class="form-control search-select">
                                    </select>-->
                                    <div style="margin-bottom:15px;" class="input-group">
                                        <span class="input-group-addon" id="icon"><i class="fa fa-calendar"></i></span>
                                        <select class="form-control search-select" name="vendedor" id="vendedor" required>
                                            @foreach($vendedores as $key)
                                                @if($key->users->id == $auth)
                                                    <option value="{{$key->users->id}}" selected>{{$key->nombre}} - {{$key->apellido}}</option>
                                                @else
                                                    <option value="{{$key->users->id}}">{{$key->nombre}} - {{$key->apellido}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title text-left">Datos de Entrada</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-md-4">
                                    <label for="fecha">Productos</label>
                                    <!--<select class="form-control search-select">
                                    </select>-->
                                    <div style="margin-bottom:15px;" class="input-group">
                                        <span class="input-group-addon" id="icon"><i class="fa fa-ravelry"></i></span>
                                        <select class="form-control search-select" name="producto" id="producto">
                                            <option selected value="0" disabled>Seleccionar</option>
                                            @foreach($productos as $key)
                                                <option value="{{$key->id}}_{{$key->nombre}}_{{$key->marca}}_{{$key->precioventa}}_{{$key->img}}_{{$key->cantidad}}">{{$key->id}} - {{$key->nombre}} - {{$key->marca}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="fecha">Cantidad</label>
                                    <!--<select class="form-control search-select">
                                    </select>-->
                                    <div style="margin-bottom:15px;" class="input-group">
                                        <span class="input-group-addon" id="icon"><i class="fa fa-braille"></i></span>
                                        <input type="number" class="form-control" id="cantidad" name="cantidad">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="fecha">Precio Venta</label>
                                    <!--<select class="form-control search-select">
                                    </select>-->
                                    <div style="margin-bottom:15px;" class="input-group">
                                        <span class="input-group-addon" id="icon"><i class="fa fa-cart-plus"></i></span>
                                        <input type="number" class="form-control" step="0.001" id="precioventa" name="precioventa">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="fecha">Cant. Bodega</label>
                                    <!--<select class="form-control search-select">
                                    </select>-->
                                    <div style="margin-bottom:15px;" class="input-group">
                                        <span class="input-group-addon" id="icon"><i class="fa fa-certificate"></i></span>
                                        <input type="number" class="form-control" id="cantidadbg" name="cantidadbg" disabled>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="btn">&nbsp;&nbsp;&nbsp;</label>
                                    <!--<select class="form-control search-select">
                                    </select>-->
                                    <button type="button" class="form-control btn btn-info btn-addon" style="color:white" id="btn_agregar"><i class="fa fa-plus"></i> Agregar</button>
                                </div>

                                <div class="table-responsive col-md-12">
                                    <table id="table_detalle" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Imagen</th>
                                                <th class="text-center">producto</th>
                                                <th class="text-center">marca</th>
                                                <th class="text-center">Precio Compra</th>
                                                <th class="text-center">Cantidad</th>
                                                <th class="text-center">Subtotal</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><b>Total:</b></td>
                                            <td class="text-center">$<input type="text" name="total" id="total" class="btn btn-sm" value='0.0'></td>
                                            <td class="text-center"></td>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <diV class="col-md-12 text-right" id="section-button">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </diV>

                </form>
            </div>
        </div>
    </div>
</div><!-- Row -->
@endsection
@section('boby-script')
<!--Aqui los scripts en el body-->
<script>
    $(document).ready(function(){
        if($('#isGuardado').val() == '1'){
            swal("Buen Trabajo!", "Venta Guardada Correctamente", "success");   
        }
    });
    var total = 0;
    var contador = 0;

    var producto_id;
    var producto_nombre;
    var producto_marca;
    var producto_precio_venta;
    var producto;
    var producto_img;
    var cantidad_bodega;

    var array_subtotal = [];
    var producto_cantidad;
    var array_control = [];

    $('#section-button').hide();//botones ocultos al inicio

    //método que permite acceder colocar datos cuando selecciono el producto
    $('#producto').change(function(){
        producto = $(this).val();
        var data = producto.split("_");

        producto_id = data[0];
        producto_nombre = data[1];
        producto_marca = data[2];
        producto_precio_venta = data[3];
        producto_img = data[4];

        producto_bodega = data[5];

        $('#cantidad').val('1');
        $('#precioventa').val(producto_precio_venta);
        $('#cantidadbg').val(producto_bodega);
    });
    $('#btn_agregar').on('click', function(){
        agregar();
    });

    function agregar(){
        if($('#producto').val() != null){
            //calculo el subtotal del producto
            producto_cantidad = $('#cantidad').val();
            if(producto_cantidad > 0){
                producto_bodega = $('#cantidadbg').val();


                if(parseInt(producto_cantidad) < parseInt(producto_bodega)){
                    producto_precio_venta = $('#precioventa').val();
                    array_subtotal[contador] = (producto_cantidad*producto_precio_venta);
                    total += array_subtotal[contador];

                    //if(!updateRow()){//verifica si un producto se actualiza o se inserta un nuevo producto
                    array_control[contador] = {'producto_id':producto_id,'index':contador ,'cantidad':producto_cantidad, 'precio_venta':producto_precio_venta};
                    //crear nueva fila para la tabla
                    var fila = '<tr id="trfila' + contador + '">'+
                        '<td class="text-center" id="td_id_'+contador +'"><input type="hidden" name="producto_id[]" id="input_id_'+contador +'" value="' + producto_id+'">' + (contador+1) +'</td>' +
                        '<td>' +
                            ' <img src="/storage/' + producto_img  +'" alt="imagen producto" style="head:32px; width:32px;">' +
                            '</td>' +
                        '<td class="text-center" id="td_nombre_'+contador +'"><input type="hidden" name="producto_nombre[]" id="input_nombre_'+contador +'" value="' +producto_nombre + '">' + producto_nombre +'</td>' +
                        '<td class="text-center" id="td_marca_'+contador +'"><input type="hidden" name="producto_marca[]" id="input_marca_'+contador +'" value="' + producto_marca + '">' + producto_marca +'</td>' +
                        '<td class="text-center" id="td_precioventa_'+contador +'"><input type="hidden" name="producto_precio_venta[]" id="input_precioventa_'+contador +'" value="' + producto_precio_venta +'"> $'+ producto_precio_venta +'</td>' +
                        '<td class="text-center" id="td_cantidad_'+contador +'"><input type="hidden" name="producto_cantidad[]" id="input_cantidad_'+contador +'" value="'+ producto_cantidad +'">' + producto_cantidad +'</td>' +
                        '<td class="text-center" id="td_subtotal_'+contador +'"><input type="hidden" name="producto_subtotal[]" id="input_subtotal_'+contador +'" value="' + array_subtotal[contador] +'"> $' + array_subtotal[contador] +'</td>' +
                        '<td class="text-center">' +
                            '<a type="button" class="btn btn-danger btn-sm fa fa-trash-o" onclick="eliminarRow('+contador+');">Eliminar</a>' +
                            '</td>' +
                        '</tr>';

                    contador++;

                    $('#table_detalle > tbody:last').append(fila);//agrego una nueva fila en la tabla detalle
                    $('#total').val(total);
                    //$('#table_detalle').dataTable();//agregar dataTable

                    evaluar();

                    /*}*/

                }else{
                    swal("Notificación", "No hay suficientes cantidades en bodega, cantidad a vender supera la cantidad en bodega", "error");
                }
                
            }else{
                swal("Notificación", "ERROR, debes agregar cantidades mayores que 0", "error");
            }
            
        }else{
            swal("Notificación", "ERROR, debes Elegir un producto", "error");
        }
    }

    //funcion para verificar si existe algun detalle en la venta, si no existe se ocultan el boton de guardar
    function evaluar(){
        if(total > 0){
            $('#section-button').show();
        }else{
            $('#section-button').hide();
        }
    }

    function eliminarRow(index){
        total = total - array_subtotal[index];
        $("#trfila"+index).remove();
        $('#total').val(total);
        contador--;
        evaluar();
    }

    //permite actualizar una fila
    function updateRow(){
        var estado = false;
        for(var i = 0; i < array_control.length; i++){
            if(array_control[i]['producto_id'] == producto_id){
                var cantidad_actual = (parseInt(array_control[i]['cantidad'])+parseInt(producto_cantidad));

                $('#input_cantidad_' + array_control[i]['index']).val(cantidad_actual);
                $('#td_cantidad_' + array_control[i]['index']).val(cantidad_actual);

                estado = true;
            }
        }

        return estado;
    }
    
</script>
@endsection
