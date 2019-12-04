@extends('layouts.app')

@section('content')
	<h3>Listado de bares</h3>

	@foreach($bars as $bar)
		<div class="container">
			{{ $bar->nombre }}
		</div>
	@endforeach

@endsection