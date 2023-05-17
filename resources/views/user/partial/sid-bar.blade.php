<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

      <li class="nav-item item-menu">
        <a class="nav-link" href="{{ route('user-dashboard')}}">
          <i class="ti-shield menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item item-menu">
        <a class="nav-link" data-bs-toggle="collapse" href="#client" aria-expanded="false" aria-controls="client">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">Cliente</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="client">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('user-cliente-lista')}}">Lista</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('user-cliente-inativos')}}">Inativos</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('user-cliente-ativos')}}">Ativos</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('user-cliente-bloqueados')}}">Bloqueados</a></li>
          
          </ul>
        </div>
      </li>
     
      <li class="nav-item item-menu">
        <a class="nav-link" data-bs-toggle="collapse" href="#relatorio" aria-expanded="false" aria-controls="relatorio">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">Relátorio</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="relatorio">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('user-relatorio-filtro') }}">Clientes</a></li>
          </ul>
        </div>
      </li>
    </ul>
</nav>
