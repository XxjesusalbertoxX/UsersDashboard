<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="" alt="Logo" class="me-2" height="32">
      <span class="fw-semibold">TourneyHub</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 mx-5">
        <li class="nav-item mx-2">
          <a class="nav-link active" aria-current="page" href="#">{{ __('Inicio') }}</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="#">{{ __('Inscripciones') }}</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="#">{{ __('Torneos') }}</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="#">{{ __('Contacto') }}</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://via.placeholder.com/32" class="rounded-circle me-2" height="32" width="32" alt="Avatar">
            <span class="d-none d-lg-inline">{{ Auth::user()->name ?? 'Usuario' }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">{{ __('Mi perfil') }}</a></li>
            <li><a class="dropdown-item" href="#">{{ __('Configuración') }}</a></li>
            <li><a class="dropdown-item" href="#">{{ __('Ir al dashboard') }}</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item text-danger" type="submit">{{ __('Cerrar sesión') }}</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
