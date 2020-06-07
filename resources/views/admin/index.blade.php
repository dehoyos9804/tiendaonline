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
    <div class="row">
        <div class="col-md-4 col-xl-12">
            <section class="panel">
                <div class="panel-body bg-primary">
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
                                <a class="text-uppercase">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
                                <h4 class="title">Nueva Factura</h4>
                                <div class="info">
                                    <small>Generar</small>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-uppercase" >(Nueva)</a>
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
                                <h4 class="title">Pagos</h4>
                                <div class="info">
                                    <small>Cuentas</small>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-uppercase">(Ver todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
</div>

@endsection
@section('boby-script')
    <!--Aqui los scripts en el body-->
@endsection