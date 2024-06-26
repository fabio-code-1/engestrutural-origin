<div class="col-md-3 col-xl-2 px-sm-2 bg-dark col-auto px-0">
  <div class="d-flex flex-column align-items-center align-items-sm-start min-vh-100 px-3 pt-2 text-white">
    <a href="{{ route('home') }}"
      class="d-flex align-items-center mb-md-0 me-md-auto text-decoration-none pb-3 text-white">
      <span class="fs-5 d-none d-sm-inline text-uppercase fw-bolder"> {{ config('app.name', 'Laravel') }} </span>
    </a>
    <ul class="nav nav-pills flex-column mb-sm-auto align-items-center align-items-sm-start mb-0" id="menu">
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link fw-bolder text-light px-0 align-middle">
          <i class="fs-4 bi bi-house-fill"></i> <span class="d-none d-sm-inline ms-1">HOME</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('cliente.index') }}" class="nav-link fw-bolder text-light px-0 align-middle">
          <i class="fs-4 bi bi-file-person-fill"></i> <span class="d-none d-sm-inline ms-1">CLIENTES</span>
        </a>
      </li>
      <li>
        <a href="{{ route('tarefa.index') }}" class="nav-link fw-bolder text-light px-0 align-middle">
          <i class="fs-4 bi-table"></i> <span class="d-none d-sm-inline ms-1">TAREFAS</span></a>
      </li>

      <li>
        <a href="#admin" data-bs-toggle="collapse" class="nav-link fw-bolder text-light px-0 align-middle">
          <i class="fs-4 bi bi-building"></i> <span class="d-none d-sm-inline ms-1">ADMINISTRAÇÃO</span>
        </a>
        <ul class="nav flex-column collapse ms-1" id="admin" data-bs-parent="#menu">
          @if (auth()->user()->chefe)
            <li>
              <a href="#" class="nav-link text-light px-0 align-middle">
                &bull; <span class="d-none d-sm-inline ms-1">PONTOS</span></a>
            </li>
            <li>
              <a href="{{ route('financeiro.index') }}" class="nav-link text-light px-0 align-middle">
                &bull; <span class="d-none d-sm-inline ms-1">FINANCEIRO</span></a>
            </li>
            <li>
              <a href="#" class="nav-link text-light px-0 align-middle">
                &bull; <span class="d-none d-sm-inline ms-1">CUSTOS FIXOS</span></a>
            </li>
            <li>
              <a href="{{ route('orcamento.index') }}" class="nav-link text-light px-0 align-middle">
                &bull; <span class="d-none d-sm-inline ms-1">ORÇAMENTO</span></a>
            </li>
          @endif
          <li>
            <a href="#" class="nav-link text-light px-0 align-middle">
              &bull; <span class="d-none d-sm-inline ms-1">HOLERITE</span></a>
          </li>
        </ul>
      </li>

      @if (auth()->user()->chefe)
        <li>
          <a href="{{ route('funcionario.index') }}" class="nav-link fw-bolder text-light px-0 align-middle">
            <i class="fs-4 bi bi-person-vcard-fill"></i></i><span class="d-none d-sm-inline ms-1">FUNCIONARIO</span>
          </a>
        </li>
      @endif
    </ul>
    <hr>
    <div class="dropdown pb-4">
      <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-white"
        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/images/auth/user-profile.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
        <span class="d-none d-sm-inline fw-bolder mx-1">{{ ucwords(Auth::user()->name) }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        {{-- <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li> --}}
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            {{ 'SAIR' }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>
