@extends('layouts.app')

@section('content')
	<h3>Listado de bares</h3>

	@foreach($bars as $bar)
		<div class="container">
			<a href="{{ route('bar.show', $bar->id) }}">{{ $bar->name }}</a>
		</div>
	@endforeach

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('bar.create') }}" class="btn btn-info text-white">Nuevo</a>
	</div>
@endsection