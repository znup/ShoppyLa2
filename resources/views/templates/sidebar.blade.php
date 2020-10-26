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
                <a class="nav-link" href="{{url('categories')}}" onclick="event.preventDefault(); document.getElementById('categories-form').submit();">
                <i class="fa fa-list"></i> Categorías</a>
                <form id="categories-form" action="{{url('categories')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{url('products')}}" onclick="event.preventDefault(); document.getElementById('products-form').submit();">
                <i class="fa fa-tasks"></i> Productos</a>
                <form id="products-form" action="{{url('products')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Compras</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('suppliers')}}" onclick="event.preventDefault();
                document.getElementById('supplier-form').submit;"><i class="fa fa-users"></i> Proveedores</a>
                <form id="supplier-form" action="{{url('suppliers')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                </form>
            </li>

<!--
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