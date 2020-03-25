@extends('layouts.app')

@section('content')
	<h3>Listado de eventos</h3>
	
	<div class="card-columns">
		@foreach($events as $event)
		<div class="card" style="width:250px">
			<img class="card-img-top" src="/storage/images/events/{{ $event->image }}" alt="Card image">		

			<div class="card-body">
				<h5 class="card-title">{{ $event->title }}</h5>

				<h6 class="card-subtitle text-muted"><i class="fas fa-map-marker-alt fa-sm"> {{ $event->city->name }}</i></h6>

				<hr>

				<h6 class="card-text">
					<b>Descripcion</b>
					{{ $event->description }}
				</h6>

				<a href="{{ route('events.show', $event->id) }}" class="btn btn-primary float-right mb-1">Ver</a>
			</div>

		</div>
		@endforeach
	</div>

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('events.create') }}" class="btn btn-info text-white fixed-bottom">Nuevo</a>
	</div>
@endsection