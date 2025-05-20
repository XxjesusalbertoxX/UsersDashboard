@extends('layouts.appadmin')
@section('Title', 'Dashboard')



@section('content')
<div class="chart">
    <div class="bar male" style="height: {{ $maleCount * 10 }}%;" title="Hombres: {{ $maleCount }}">
        <span>{{ $maleCount }} Hombres</span>
    </div>
    <div class="bar female" style="height: {{ $femaleCount * 10 }}%;" title="Mujeres: {{ $femaleCount }}">
        <span>{{ $femaleCount }} Mujeres</span>
    </div>
</div>

<p>Hombres: {{ $maleCount }}</p>
<p>Mujeres: {{ $femaleCount }}</p>
<p>Altura hombres: {{ $maleCount * 10 }}%</p>
<p>Altura mujeres: {{ $femaleCount * 10 }}%</p>

@endsection
