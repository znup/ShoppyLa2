<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('home')}}" onclick="event.preventDefault(); document.getElementById('home-form').submit();"></i> Dashboard</a>
            </li>
            <form id="home-form" action="{{url('home')}}" method="GET" style="display: none;">
                {{csrf_field()}}
            </form>
            <li class="nav-title">
                Menú
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{url('category')}}" onclick="event.preventDefault(); document.getElementById('categoria-form').submit();">
                <i class="fa fa-list"></i> Categorías</a>
                <form id="categoria-form" action="{{url('category')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{url('product')}}" onclick="event.preventDefault(); document.getElementById('product-form').submit();">
                <i class="fa fa-tasks"></i> Productos</a>
                <form id="product-form" action="{{url('product')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>

<!--
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Compras</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-users"></i> Proveedores</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-suitcase"></i> Ventas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-users"></i> Clientes</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-user"></i> Usuarios</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-list"></i> Roles</a>
            </li>
        -->

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>