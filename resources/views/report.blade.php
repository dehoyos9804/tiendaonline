<!-- Styles
<link href='{{url("ecaps")}}/https://fonts.googleapis.com/css?family=Ubuntu' rel="stylesheet">
<link href='{{url("ecaps")}}/assets/plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet">
<link href='{{url("ecaps")}}/assets/plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet">
<link href='{{url("ecaps")}}/assets/plugins/icomoon/style.css' rel="stylesheet">
<link href='{{url("ecaps")}}/assets/plugins/uniform/css/default.css' rel="stylesheet"/>
<link href='{{url("ecaps")}}/assets/plugins/switchery/switchery.min.css' rel="stylesheet"/>
      
<!-Theme Styles --
<link href='{{url("ecaps")}}/assets/css/ecaps.min.css' rel="stylesheet">
<link href='{{url("ecaps")}}/assets/css/custom.css' rel="stylesheet">
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http:////maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="http:////cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        * { margin: 0px; padding: 0; }
        body { font: 14px/1.4 Georgia, serif; }
        #page-wrap { width: 600px; margin: 0 auto; }

        textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
        table td, table th { border: 1px solid black; padding: 5px; }

        #header { height: 30px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

        #address { width: 250px; height: 70px;  }
        #customer { overflow: hidden; }

        #customer-title { font-size: 20px; font-weight: bold; text-align: center; }

        td { text-align: right;  }
        td.meta-head { text-align: right; background: #eee; }
        td textarea { width: 100%; height: 20px; text-align: right; }

        #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
        #items th { background: #eee; }
        #items textarea { width: 90px; height: 90px; }
        #items tr.item-row td { border: 0; vertical-align: top; }
        #items td.description { width: 300px; }
        #items td.item-name { width: 175px; }
        #items td.description textarea, #items td.item-name textarea { width: 100%; }
        #items td.total-line { border-right: 0; text-align: right; }
        #items td.total-value { border-left: 0; padding: 10px; }
        #items td.total-value textarea { height: 20px; background: none; }
        #items td.balance { background: #eee; }
        #items td.blank { border: 0; text-align:center; }

        #terms { text-align: center; margin: 20px 0 0 0; }
        #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
        #terms textarea { width: 100%; text-align: center;}

        .delete-wpr { position: relative; }
        .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }

    </style> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <a href="{{ route('imprimir') }}" class="btn btn-warning btn-sm fa fa-file-pdf-o">Imprimir</a>

    <body>
        <div id="page-wrap">

        
        <h2 id="customer-title">Factura de Compra</h2>
        <textarea id="header">TIENDA R.D.</textarea>

        <div style="clear:both"></div>

        <div id="customer">
            <div id="identity">
                <h6 id="address">
                Estamos ubicados en el antiguo
                mercado de Sincelejo-Sucre.
                Telefono: (035) 282 -9865
                </h6>
            </div>
            
            <table id="meta">
                <tr>
                    <td class="meta-head">Factura Nº #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Fecha</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Total</td>
                    <td><div class="due">$875.00</div></td>
                </tr>

            </table>

        </div>

        <table id="items">

        <tr style="text-align:center;">
            <th>Producto</th>
            <th>Marca</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
        
        <tr class="item-row">
            <td>Acetaminofen</td>
            <td>Generico</td>
            <td>$650.00</td>
            <td>1</td>
            <td>$650.00</td>
        </tr>
        
        <tr id="hiderow">
            <td colspan="5"><a id="addrow" title="Add a row"> </a></td>
        </tr>
        <tr id="hiderow">
            <td colspan="5"><a id="addrow" title="Add a row"> </a></td>
        </tr>
        
        <tr>
            <td colspan="2" class="blank"> Gracias por visitarnos! </td>
            <td colspan="2" class="total-line">Subtotal</td>
            <td class="total-value"><div id="subtotal">$875.00</div></td>
        </tr>
        <tr>
            <td colspan="2" class="blank"> Vuelva Pronto! =)</td>
            <td colspan="2" class="total-line">Total</td>
            <td class="total-value"><div id="total">$875.00</div></td>
        </tr>
        
        </table>

        <div id="terms">
        <h5>Terms</h5>
        <textarea>Derechos reservados</textarea>
        </div>

        </div>
    </body>
</html>



<!-- 
<div class="page-inner">
        <div class="page-title">
            <h3 class="breadcrumb-header">Reporte</h3>
        </div>
    <div id="main-wrapper" style="width: 70%;margin-left: auto;margin-right: auto;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                            <div class="col-md-4" style="padding-left:0;">
                                <h3 class="m-b-md m-t-xxs"><b>Tienda el centro RD</b></h3>
                                <address>
                                    Antiguo mercado de Sincelejo-Sucre<br>
                                    Tel: (035)+ 256-7890
                                </address>
                            </div>
                            <div class="col-md-8 text-right" style="padding-right:0;">
                                <h3 class="m-t-xs">Factura</h3> -->
                                <!--  
                            </div>
                            <div class="col-md-12" style="padding-left:0;">
                                <hr>
                                <p>
                                    <strong>Factura de</strong><br>
                                    Nombre:  nombre cliente --
                                    <br>
                                    Telefono: nombre cliente --
                                    <br>
                                    Direccion:  nombre cliente --
                                </p>
                            </div>
                            <div class="col-md-12" style="padding-left:0;padding-right:0;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Marca</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Acetaminofen</td>
                                            <td>MK</td>
                                            <td>10</td>
                                            <td>$500</td>
                                            <td>$5000</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8" style="padding-left:0;">
                                <h4>Gracias Por La Compra</h4>
                                <p>Vuelva pronto, lo esperaremos con los brazos abiertos</p>
                                 <img src="" height="150" class="m-t-lg" alt="la imagen que quieras"> 
                            </div>
                            <div class="col-md-4" style="padding-right:0;">
                                <div class="text-right">
                                    <h4 class="no-m m-t-sm">Subtotal</h4>
                                    <h2 class="no-m">
                                     suma de precios --
                                    </h2>
                                    <hr style="width:60%;margin-left: auto;margin-right: 0;">
                                    <h4 class="no-m m-t-sm">IVA</h4>
                                    <h2 class="no-m">
                                     aqui va el iva --
                                    </h2>
                                    <hr style="width:60%;margin-left: auto;margin-right: 0;">
                                    <h4 class="no-m m-t-md text-success">Total</h4>
                                    <h1 class="no-m text-success">
                                     subtotal + iva --
                                    </h1>
                                    <hr style="width:60%;margin-left: auto;margin-right: 0;">
                                    
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     -->
<!--     
    <script src='{{url("ecaps")}}/assets/plugins/jquery/jquery-3.1.0.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/bootstrap/js/bootstrap.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/uniform/js/jquery.uniform.standalone.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/switchery/switchery.min.js'></script>
    <script src='{{url("ecaps")}}/assets/js/ecaps.min.js'></script> -->