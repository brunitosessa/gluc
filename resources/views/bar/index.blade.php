@extends('layouts.app')

@section('content')
	<h3>Listado de bares</h3>

	@foreach($bars as $bar)
		<div class="container">
			<a href="bars/{{ $bar->id }}">{{ $bar->nombre }}</a>
		</div>
	@endforeach

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('bar.create') }}" class="btn btn-info text-white">Nuevo</a>
	</div>
@endsection