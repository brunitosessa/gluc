@extends('layouts.app')

@section('content')
	<div class="container clearfix">
		<div class="float-left">
			<img src="/storage/images/events/{{ $event->image }}" class="img-fluid rounded" width="250">
		</div>

		<div class="float-left ml-5">
			<p>
				<b>Titulo</b>
				{{ $event->title }}
			</p>
			<p>
				<b>Direccion</b>
				{{ $event->address }}
			</p>
			<p>
				<b>Latitud</b>
				{{ $event->lat }}
			</p>
			<p>
				<b>Longitud</b>
				{{ $event->lng }}
			</p>
			<p>
				<b>Descripcion</b>
				{{ $event->description }}
			</p>
			<p>
				<b>Localidad</b>
				{{ $event->city->name }}
			</p>
		</div>
	</div>

	<div class="container mt-2">
		@if ($event->enabled)
			<div class="alert alert-info">
				Evento habilitado
			</div>
		@else
			<div class="alert alert-danger">
				Evento deshabilitado
			</div>
		@endif
	</div>

	<div class="container">	    
		<div class="form-group float-right ml-2">
			{!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id]]) !!}
				{{ Form::button('Eliminar', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
			{!! Form::close() !!}
		</div>

		<div class="form-group float-right ml-2">
			{!! Form::open(['method' => 'GET', 'route' => ['events.edit', $event->id]]) !!}
				{{ Form::button('Editar', array('class' => 'btn btn-info', 'type' => 'submit')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection