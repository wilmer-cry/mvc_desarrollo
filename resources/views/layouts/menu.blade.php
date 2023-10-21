<li class="nav-item">
    <a href="{{ route('analises.index') }}"
       class="nav-link {{ Request::is('analises*') ? 'active' : '' }}">
        <p>Analises</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('productos.index') }}"
       class="nav-link {{ Request::is('productos*') ? 'active' : '' }}">
        <p>Productos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('tiendas.index') }}"
       class="nav-link {{ Request::is('tiendas*') ? 'active' : '' }}">
        <p>Tiendas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('categorias.index') }}"
       class="nav-link {{ Request::is('categorias*') ? 'active' : '' }}">
        <p>Categorias</p>
    </a>
</li>


