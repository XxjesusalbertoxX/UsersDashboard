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
      $maxGender = max($data['maleCount'], $data['femaleCount']) ?: 1;
      $maxAge    = max($data['minorsCount'], $data['adultsCount']) ?: 1;
      $maxCombined = max(
        $data['maleAdults'],
        $data['maleMinors'],
        $data['femaleAdults'],
        $data['femaleMinors']
      ) ?: 1;
  @endphp
  
  <div class="row mb-4">
      <div class="col-12 col-md-6">
        <h5>Distribución por género</h5>
        <div class="d-flex flex-row align-items-end justify-content-around" style="height: 180px;">
          <div class="d-flex flex-column align-items-center justify-content-end" style="width: 80px; height: 100%;">
            <div class="fw-bold mb-1">{{ $data['maleCount'] }}</div>
            <div class="bar male"
                 style="height: {{ round($data['maleCount'] / $maxGender * 100, 1) }}%; width: 40px;"
                 title="Hombres: {{ $data['maleCount'] }}">
            </div>
            <div class="mt-2 small">Hombres</div>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-end" style="width: 80px; height: 100%;">
            <div class="fw-bold mb-1">{{ $data['femaleCount'] }}</div>
            <div class="bar female"
                 style="height: {{ round($data['femaleCount'] / $maxGender * 100, 1) }}%; width: 40px;"
                 title="Mujeres: {{ $data['femaleCount'] }}">
            </div>
            <div class="mt-2 small">Mujeres</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <h5>Distribución por edad</h5>
        <div class="d-flex flex-row align-items-end justify-content-around" style="height: 180px;">
          <div class="d-flex flex-column align-items-center justify-content-end" style="width: 80px; height: 100%;">
            <div class="fw-bold mb-1">{{ $data['minorsCount'] }}</div>
            <div class="bar minor"
                 style="height: {{ round($data['minorsCount'] / $maxAge * 100, 1) }}%; width: 40px; background-color: #007bff;"
                 title="Menores: {{ $data['minorsCount'] }}">
            </div>
            <div class="mt-2 small">Menores</div>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-end" style="width: 80px; height: 100%;">
            <div class="fw-bold mb-1">{{ $data['adultsCount'] }}</div>
            <div class="bar adult"
                 style="height: {{ round($data['adultsCount'] / $maxAge * 100, 1) }}%; width: 40px;"
                 title="Mayores: {{ $data['adultsCount'] }}">
            </div>
            <div class="mt-2 small">Mayores</div>
          </div>
        </div>
      </div>
  </div>
  
  <div class="row mb-4">
      <div class="col-12">
        <h5>Resumen combinado</h5>
        <div class="d-flex flex-row align-items-end justify-content-around" style="height: 180px;">
          <div class="d-flex flex-column align-items-center justify-content-end" style="width: 80px; height: 100%;">
            <div class="fw-bold mb-1">{{ $data['maleAdults'] }}</div>
            <div class="bar male-adult"
                 style="height: {{ round($data['maleAdults'] / $maxCombined * 100, 1) }}%; width: 40px;"
                 title="Hombres Mayores: {{ $data['maleAdults'] }}">
            </div>
            <div class="mt-2 small">Hombres<br>Mayores</div>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-end" style="width: 80px; height: 100%;">
            <div class="fw-bold mb-1">{{ $data['maleMinors'] }}</div>
            <div class="bar male-minor"
                 style="height: {{ round($data['maleMinors'] / $maxCombined * 100, 1) }}%; width: 40px;"
                 title="Hombres Menores: {{ $data['maleMinors'] }}">
            </div>
            <div class="mt-2 small">Hombres<br>Menores</div>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-end" style="width: 80px; height: 100%;">
            <div class="fw-bold mb-1">{{ $data['femaleAdults'] }}</div>
            <div class="bar female-adult"
                 style="height: {{ round($data['femaleAdults'] / $maxCombined * 100, 1) }}%; width: 40px;"
                 title="Mujeres Mayores: {{ $data['femaleAdults'] }}">
            </div>
            <div class="mt-2 small">Mujeres<br>Mayores</div>
          </div>
          <div class="d-flex flex-column align-items-center justify-content-end" style="width: 80px; height: 100%;">
            <div class="fw-bold mb-1">{{ $data['femaleMinors'] }}</div>
            <div class="bar female-minor"
                 style="height: {{ round($data['femaleMinors'] / $maxCombined * 100, 1) }}%; width: 40px;"
                 title="Mujeres Menores: {{ $data['femaleMinors'] }}">
            </div>
            <div class="mt-2 small">Mujeres<br>Menores</div>
          </div>
        </div>
      </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-6">
      <h5>Gráfica 4</h5>
      <div class="chart">
      </div>
    </div>
    <div class="col-12 col-md-6">
      <h5>Gráfica 5</h5>
      <div class="chart">
      </div>
    </div>
  </div>

</div>
@endsection
