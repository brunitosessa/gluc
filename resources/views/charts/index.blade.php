@extends('layouts.app')

@section('content')
<h1 class="text-center">Proximamente</h1>

<h3>Graficos</h3>
{!! $chart->container() !!}

@endsection