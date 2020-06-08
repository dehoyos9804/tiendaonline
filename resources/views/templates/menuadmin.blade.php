<ul class="accordion-menu">
    <li class="active-page">
        <a href="{{route('admin.index')}}">
            <i class="menu-icon icon-home4"></i><span>Inicio</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.proveedor.listaproveedores') }}">
            <i class="menu-icon fa fa-money" ></i><span>Proveedores</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.seccion.listasecciones') }}">
            <i class="menu-icon fa fa-tasks"></i><span>Secciones</span>
        </a>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon fa fa-user-o"></i><span>Vendedores</span><i class="accordion-icon fa fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a class="menu-icon fa fa-plus-square" href="{{ route('admin.persona.createpersona') }}">Registrar Vendedor</a></li>
            <li><a class="menu-icon fa fa-table" href="{{ route('admin.persona.listapersonas') }}">Lista Vendedores</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon fa fa-pie-chart"></i><span>Productos</span><i class="accordion-icon fa fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a class="menu-icon fa fa-plus-square" href="{{ route('admin.producto.createproducto') }}"> Registrar Producto</a></li>
            <li><a class="menu-icon fa fa-table" href="{{ route('admin.producto.listaproductos') }}"> Lista de Productos</a></li>
            
        </ul>
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
            <i class="menu-icon fa fa-shopping-cart"></i><span>Compras</span><i class="accordion-icon fa fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a class="menu-icon fa fa-plus-square" href="{{ route('admin.compra.index', ['isGuardado'=>'0'])}}"> Nueva Compra</a></li>
            <li><a class="menu-icon fa fa-table" href="{{route('admin.compra.lista')}}"> Lista Compras</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon fa fa-shopping-basket"></i><span>Ventas</span><i class="accordion-icon fa fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a class="menu-icon fa fa-plus-square" href="{{ route('venta.index', ['isGuardado'=>'0'])}}"> Nueva Venta</a></li>
            <li><a class="menu-icon fa fa-table" href="{{ route('venta.lista') }}"> Lista Ventas</a></li>
        </ul>
    </li>
    
</ul>