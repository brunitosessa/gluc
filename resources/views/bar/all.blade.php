@extends('bar.template')

@section('title')
	<h3>Listado de bares</h3>
@endsection

@section('content')
	@foreach($bars as $bar)
		<div class="container">
			{{ $bar->nombre }}
		</div>
	@endforeach

@endsection