@extends('layouts.appadmin')
@section('Title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">

  <!-- Fila 1: Cuadros resumen -->
  <div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
      <div class="card text-center p-3">
        <h6>Usuarios</h6>
        <h3>{{ $data['maleCount'] + $data['femaleCount'] }}</h3>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card text-center p-3">
        <h6>Torneos</h6>
        <h3>{{ $data['tournamentsCount'] ?? 0 }}</h3>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card text-center p-3">
        <h6>Equipos</h6>
        <h3>{{ $data['teamsCount'] ?? 0 }}</h3>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card text-center p-3">
        <h6>Inscripciones</h6>
        <h3>{{ $data['registrationsCount'] ?? 0 }}</h3>
      </div>
    </div>
  </div>

  @php
    // Máximos para escalar
    $maxGender = max($data['maleCount'], $data['femaleCount']) ?: 1;
    $maxAge    = max($data['minorsCount'], $data['adultsCount']) ?: 1;
  @endphp

  <div class="row mb-4">
      <div class="col-12 col-md-6">
        <h5>Distribución por género</h5>
        <div class="chart d-flex gap-3">
          <div class="d-flex align-items-center">
            <div class="bar male"
                 style="height: {{ round($data['maleCount'] / $maxGender * 100, 1) }}px; width: 40px;"
                 title="Hombres: {{ $data['maleCount'] }}">
              <span>{{ $data['maleCount'] }}</span>
            </div>
            <div class="ms-3">
              <span class="badge bg-primary">Hombres</span>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="bar female"
                 style="height: {{ round($data['femaleCount'] / $maxGender * 100, 1) }}px; width: 40px;"
                 title="Mujeres: {{ $data['femaleCount'] }}">
              <span>{{ $data['femaleCount'] }}</span>
            </div>
            <div class="ms-3">
              <span class="badge" style="background:#e83e8c;">Mujeres</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <h5>Distribución por edad</h5>
        <div class="chart d-flex gap-3">
          <div class="d-flex align-items-center">
            <div class="bar minor"
                 style="height: {{ round($data['minorsCount'] / $maxAge * 100, 1) }}px; width: 40px;"
                 title="Menores: {{ $data['minorsCount'] }}">
              <span>{{ $data['minorsCount'] }}</span>
            </div>
            <div class="ms-3">
              <span class="badge bg-warning text-dark">Menores</span>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="bar adult"
                 style="height: {{ round($data['adultsCount'] / $maxAge * 100, 1) }}px; width: 40px;"
                 title="Mayores: {{ $data['adultsCount'] }}">
              <span>{{ $data['adultsCount'] }}</span>
            </div>
            <div class="ms-3">
              <span class="badge bg-success">Mayores</span>
            </div>
          </div>
        </div>
      </div>
  </div>
  @php
    $maxCombined = max(
      $data['maleAdults'],
      $data['maleMinors'],
      $data['femaleAdults'],
      $data['femaleMinors']
    ) ?: 1;
  @endphp

  <div class="row mb-4">
    <div class="col-12">
      <h5>Resumen combinado</h5>
      <div class="combined-chart d-flex gap-3">
        <div class="d-flex align-items-center">
          <div class="bar male-adult"
               style="height: {{ round($data['maleAdults'] / $maxCombined * 100, 1) }}px; width: 40px;"
               title="Hombres Mayores: {{ $data['maleAdults'] }}">
            <span>{{ $data['maleAdults'] }}</span>
          </div>
          <div class="ms-3">
            <span class="badge bg-primary">Hombres Mayores</span>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div class="bar male-minor"
               style="height: {{ round($data['maleMinors'] / $maxCombined * 100, 1) }}px; width: 40px;"
               title="Hombres Menores: {{ $data['maleMinors'] }}">
            <span>{{ $data['maleMinors'] }}</span>
          </div>
          <div class="ms-3">
            <span class="badge bg-secondary">Hombres Menores</span>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div class="bar female-adult"
               style="height: {{ round($data['femaleAdults'] / $maxCombined * 100, 1) }}px; width: 40px;"
               title="Mujeres Mayores: {{ $data['femaleAdults'] }}">
            <span>{{ $data['femaleAdults'] }}</span>
          </div>
          <div class="ms-3">
            <span class="badge" style="background:#e83e8c;">Mujeres Mayores</span>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div class="bar female-minor"
               style="height: {{ round($data['femaleMinors'] / $maxCombined * 100, 1) }}px; width: 40px;"
               title="Mujeres Menores: {{ $data['femaleMinors'] }}">
            <span>{{ $data['femaleMinors'] }}</span>
          </div>
          <div class="ms-3">
            <span class="badge bg-warning text-dark">Mujeres Menores</span>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection
