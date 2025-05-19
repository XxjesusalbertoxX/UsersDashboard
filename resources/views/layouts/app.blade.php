<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="overflow-x-hidden">

    {{-- Navbar global --}}
        @include('layouts.navigation')

    {{-- Contenido dinámico --}}
    @include('main.carousel')
    <main>
        <section class="text-white text-center p-5" style="background: url('https://previews.123rf.com/images/pixelprohd/pixelprohd1803/pixelprohd180300005/97382629-fondo-de-f%C3%BAtbol-crema-transparente.jpg') center center / cover no-repeat fixed; min-height: 90vh;">
  <div class="container bg-dark bg-opacity-50 p-3 rounded">
    
    @auth
      <h2 class="mb-3">{{ __('¡Bienvenido de nuevo,') }} {{ Auth::user()->name }}!</h2>
      <p class="lead">{{ __('Explora los próximos torneos y administra tus inscripciones desde tu panel.') }}</p>
      <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">{{ __('Ir al Dashboard') }}</a>
    @endauth

    @guest
      <h2 >{{ __('¿Listo para competir?') }}</h2>
      <p class="lead">{{ __('Regístrate y participa en torneos emocionantes.') }}</p>
      <a href="{{ route('register') }}" class="btn btn-primary mx-2">{{ __('Registrarse') }}</a>
      <a href="{{ route('login') }}" class="btn btn-outline-light mx-2">{{ __('Iniciar sesión') }}</a>
    @endguest

  </div>
</section>
{{-- ===== Lista de torneos con pestañas ===== --}}
<section class="py-5">
  <div class="container">

    <!-- Nav‑tabs -->
    <ul class="nav nav-tabs mb-4" id="tournamentTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="upcoming-tab" data-bs-toggle="tab"
                data-bs-target="#upcoming" type="button" role="tab">
          {{ __('Próximos') }}
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ongoing-tab" data-bs-toggle="tab"
                data-bs-target="#ongoing" type="button" role="tab">
          {{ __('En curso') }}
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="finished-tab" data-bs-toggle="tab"
                data-bs-target="#finished" type="button" role="tab">
          {{ __('Finalizados') }}
        </button>
      </li>
    </ul>

    <!-- Contenido de cada pestaña -->
    <div class="tab-content" id="tournamentTabsContent">

      {{-- Próximos torneos --}}
      <div class="tab-pane fade show active" id="upcoming" role="tabpanel">
        <div class="row g-4">
          @forelse ($upcoming as $torneo)
            <div class="col-md-4">
              <div class="card h-100">
                <img src="{{ $torneo->image_url ?? 'https://via.placeholder.com/400x200' }}" class="card-img-top" alt="{{ $torneo->name }}">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">{{ $torneo->name }}</h5>
                  <p class="card-text mb-1"><i class="fa-solid fa-calendar-days me-1"></i>
                    {{ $torneo->start_date->format('d M Y') }}
                  </p>
                  <p class="card-text flex-grow-1"><i class="fa-solid fa-location-dot me-1"></i>
                    {{ $torneo->location ?? 'TBD' }}
                  </p>

                  @auth
                    <a href="{{ route('tournaments.show', $torneo) }}" class="btn btn-primary w-100 mt-auto">
                      {{ __('Inscribirse') }}
                    </a>
                  @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary w-100 mt-auto">
                      {{ __('Inicia sesión para inscribirte') }}
                    </a>
                  @endauth
                </div>
              </div>
            </div>
          @empty
            <p class="text-muted">{{ __('No hay torneos próximos.') }}</p>
          @endforelse
        </div>
      </div>

      {{-- Torneos en curso --}}
      <div class="tab-pane fade" id="ongoing" role="tabpanel">
        <ul class="list-group list-group-flush">
          @forelse ($ongoing as $torneo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span>
                <strong>{{ $torneo->name }}</strong>
                <small class="text-muted ms-2">{{ $torneo->start_date->format('d M') }}</small>
              </span>
              <a href="{{ route('tournaments.show', $torneo) }}" class="btn btn-sm btn-secondary">
                {{ __('Detalles') }}
              </a>
            </li>
          @empty
            <li class="list-group-item text-muted">{{ __('No hay torneos en curso.') }}</li>
          @endforelse
        </ul>
      </div>

      {{-- Torneos finalizados --}}
      <div class="tab-pane fade" id="finished" role="tabpanel">
        <div class="row g-4">
          @forelse ($finished as $torneo)
            <div class="col-md-3">
              <div class="card text-bg-light h-100">
                <div class="card-body">
                  <h6 class="card-title">{{ $torneo->name }}</h6>
                  <p class="card-text">
                    <i class="fa-solid fa-trophy me-1 text-warning"></i>
                    {{ __('Finalizado el') }} {{ $torneo->end_date->format('d M Y') }}
                  </p>
                </div>
              </div>
            </div>
          @empty
            <p class="text-muted">{{ __('No hay torneos finalizados.') }}</p>
          @endforelse
        </div>
      </div>

    </div>
  </div>
</section>

    </main>
        
        
</body>
</html>
