<ul class="accordion-menu">
    <li class="active-page">
        <a href="{{route('admin.index')}}">
            <i class="menu-icon icon-home4"></i><span>Inicio</span>
        </a>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon fa fa-users"></i><span>Clientes</span><i class="accordion-icon fa fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a class="menu-icon fa fa-plus-square" href="{{ route('admin.cliente.createcliente') }}"> Registrar Cliente</a></li>
            <li><a class="menu-icon fa fa-table" href="{{ route('admin.cliente.listaclientes') }}"> Lista de Clientes</a></li>
            
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon fa fa-shopping-basket"></i><span>Ventas</span><i class="accordion-icon fa fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a class="menu-icon fa fa-plus-square" href="{{ route('venta.index', ['isGuardado'=>'0'])}}"> Nueva Venta</a></li>
        </ul>
    </li>
    
</ul>
