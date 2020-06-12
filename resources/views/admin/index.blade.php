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
    <div class="col-md-12 col-lg-12 col-xl-4">
    @if($user_auth->tipousuario->nombre == 'ADMINISTRADOR')
        <div class="row">

            <div class="col-md-2 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-white">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Usuarios</h4>
                                    <div class="info">
                                        <small>Lista</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('admin.persona.listapersonas')}}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-2 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-secondary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Ventas</h4>
                                    <div class="info">
                                        <small>Lista</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('venta.lista')  }}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-2 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-tertiary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon"">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Compras</h4>
                                    <div class="info">
                                        <small>Lista</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('admin.compra.lista')  }}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-2 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-tertiary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-tasks"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Secciones</h4>
                                    <div class="info">
                                        <small>Lista</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('admin.seccion.listasecciones')  }}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-2 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-tertiary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-certificate"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Proveedores</h4>
                                    <div class="info">
                                        <small>Lista</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('admin.proveedor.listaproveedores')  }}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-2 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-tertiary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-pie-chart"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Productos</h4>
                                    <div class="info">
                                        <small>Lista</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('admin.producto.listaproductos')  }}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @elseif($user_auth->tipousuario->nombre == 'VENDEDOR')
    <div class="row">
            <div class="col-md-4 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-secondary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Ventas</h4>
                                    <div class="info">
                                        <small>Generar</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('venta.index',['isGuardado'=>'0'])  }}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-tertiary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Clientes</h4>
                                    <div class="info">
                                        <small>Lista</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('admin.cliente.listaclientes')  }}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <div class="col-md-4 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-tertiary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-pie-chart"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Agregar Cliente</h4>
                                    <div class="info">
                                        <small>nueva</small>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-uppercase" href="{{route('admin.cliente.createcliente')  }}">(Ver Todo)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif
    
    </div>

@endsection
@section('boby-script')
    <!--Aqui los scripts en el body-->
@endsection