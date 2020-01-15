@extends('layouts.app')

@section('content')
	<h3>Listado de eventos</h3>

    <div class="form-group">
	    {!! Form::search('name', '', ['class' => 'form-control']) !!}
	</div>
	
	<div class="card-columns">
		@foreach($events as $event)
		<div class="card" style="width:250px">
			<img class="card-img-top" src="/storage/images/events/{{ $event->image }}" alt="Card image">
			<div class="card-body">
				<h4 class="card-title">{{ $event->title }}</h4>
				<p class="card-text">{{ $event->description }}</p>
				<p class="card-text">{{ $event->city->name }}</p>
				<a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Ver</a>
			</div>

		</div>
		@endforeach
	</div>

	<div class="d-flex flex-row-reverse">
		{!! $events->links() !!}
	</div>

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('events.create') }}" class="btn btn-info text-white">Nuevo</a>
	</div>
@endsection