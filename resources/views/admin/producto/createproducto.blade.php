@extends('templates.template')
@section('titulo', 'Admin | Tienda Online')

@section('menu')
  @include('templates.menuadmin')
@endsection

@section('head-style-script')
    <!--Aqui los estilos y scripts en el head-->
@endsection
@section('contenido')
<!-- <script src='{{url("ecaps")}}/assets/plugins/plupload/js/plupload.full.min.js'></script>
<script src='{{url("ecaps")}}/assets/plugins/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js'></script>
<script src='{{url("ecaps")}}/assets/plugins/dropzone/dropzone.min.js'></script>
<script src='{{url("ecaps")}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/uniform/js/jquery.uniform.standalone.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/switchery/switchery.min.js'></script>
    <script src='{{url("ecaps")}}/assets/js/ecaps.min.js'></script>
        <script src='{{url("ecaps")}}/assets/js/pages/form-file-upload.js'></script>
        <link href='{{url("ecaps")}}/assets/plugins/switchery/switchery.min.css' rel="stylesheet"/>
        <link href='{{url("ecaps")}}/assets/plugins/dropzone/dropzone.min.css' rel="stylesheet">
        <link href='{{url("ecaps")}}/assets/plugins/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css' rel="stylesheet" type="text/css"/> -->
       
        
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Registrar Producto</h4>
                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('admin.producto.storeproducto') }}" require>
                    {!! csrf_field() !!}
                    <div class="col-md-4">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Imagen</label>
                        <!-- El input para seleccionar los archivos, fíjate en su id -->
                            <input type="file" id="seleccionArchivos" accept="image/*" name="img">
                            <!-- La imagen que vamos a usar para previsualizar lo que el usuario selecciona -->
                            <img width="100%" height="100%" id="imagenPrevisualizacion">
                            <script src="script.js"></script>
                    </div>
                    <script type="text/javascript">
                    const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
                        $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

                        // Escuchar cuando cambie
                        $seleccionArchivos.addEventListener("change", () => {
                        // Los archivos seleccionados, pueden ser muchos o uno
                        const archivos = $seleccionArchivos.files;
                        // Si no hay archivos salimos de la función y quitamos la imagen
                        if (!archivos || !archivos.length) {
                            $imagenPrevisualizacion.src = "";
                            return;
                        }
                        // Ahora tomamos el primer archivo, el cual vamos a previsualizar
                        const primerArchivo = archivos[0];
                        // Lo convertimos a un objeto de tipo objectURL
                        const objectURL = URL.createObjectURL(primerArchivo);
                        // Y a la fuente de la imagen le ponemos el objectURL
                        $imagenPrevisualizacion.src = objectURL;
                        });
                    </script>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" require>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Marca</label>
                        <input type="text" class="form-control" name="marca" placeholder="Marca" require>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Precio Compra</label>
                        <input type="text" class="form-control" name="preciocompra" placeholder="Precio Compra" require>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Precio Venta</label>
                        <input type="text" class="form-control" name="precioventa" placeholder="Precio Venta" require>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Cantidad</label>
                        <input type="text" class="form-control" name="cantidad" placeholder="Cantidad" require>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Estado</label>
                            <select style="margin-bottom:15px;" name="estado" class="form-control" require>
                                <option>seleccione</option>
                                <option>ACTIVO</option>
                                <option>INACTIVO</option>
                            </select>
                        </div>                
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Seccion</label>
                        <select class="form-control select" name="secciones_id" id="secciones_id" data-live-search="true" require>
                            <option value="0" selected>seleccione</option>
                            @foreach($varseccion as $seccion)
                                <option value="{{$seccion->id}}">{{$seccion->nombre}}</option>
                            @endforeach
                        </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('boby-script')
    <!--Aqui los scripts en el body-->
    <!-- <script src='{{url("ecaps")}}/assets/plugins/plupload/js/plupload.full.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/dropzone/dropzone.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/uniform/js/jquery.uniform.standalone.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/switchery/switchery.min.js'></script>

<script type="text/javascript">
$(function() {
  $("#my-dropzone").dropzone({
    //url: "/file/post", // If not using a form element
  });

});

</script>  -->
@endsection