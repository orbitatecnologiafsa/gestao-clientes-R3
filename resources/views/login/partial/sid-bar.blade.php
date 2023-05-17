<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

      <li class="nav-item item-menu">
        <a class="nav-link" href="{{ route('dashboard')}}">
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
            <li class="nav-item"> <a class="nav-link" href="{{ route('cliente-lista')}}">Lista</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('cliente-inativos')}}">Inativos</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('cliente-ativos')}}">Ativos</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('cliente-bloqueados')}}">Bloqueados</a></li>
            @if(Auth::user()->nivel ==0 )
            <li class="nav-item"> <a class="nav-link" href="{{ route('cliente-cadastro')}}">Cadastro</a></li>
            @endif


          </ul>
        </div>
      </li>
      @if(Auth::user()->nivel ==0 )
      <li class="nav-item item-menu">
        <a class="nav-link" data-bs-toggle="collapse" href="#empresa" aria-expanded="false" aria-controls="empresa">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">Empresa</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="empresa">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('empresa-lista')}}">Lista</a></li>
            
            <li class="nav-item"> <a class="nav-link" href="{{ route('empresa-cadastro')}}">Cadastro</a></li>
          </ul>
        </div>
      </li>


      <li class="nav-item item-menu">
        <a class="nav-link" data-bs-toggle="collapse" href="#usuario" aria-expanded="false" aria-controls="usuario">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">Usuario</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="usuario">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{ route('usuario-cadastro')}}">Cadastro</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('usuario-lista')}}">Lista</a></li>

          </ul>
        </div>
      </li>


      <li class="nav-item item-menu">
        <a class="nav-link" data-bs-toggle="collapse" href="#log" aria-expanded="false" aria-controls="log">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">Log</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="log">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('lista-log')}}">Lista</a></li>

          </ul>
        </div>
      </li>

      
      @endif
      <li class="nav-item item-menu">
        <a class="nav-link" data-bs-toggle="collapse" href="#relatorio" aria-expanded="false" aria-controls="relatorio">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">Relátorio</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="relatorio">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('relatorio-filtro') }}">Clientes por cidade</a></li>
          </ul>
        </div>
      </li>
    </ul>
</nav>
