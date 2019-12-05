@extends('layouts.app')

@section('content')
	<div class="container">
		<img src="/images/bars/{{ $bar->image }}">
		<p>
			Nombre:
			{{ $bar->name }}
		</p>
		<p>
			Localidad:
			{{ $bar->city->name }}
		</p>
		<p>
			Direccion:
			{{ $bar->address }}
		</p>
		<p>
			Descripcion:
			{{ $bar->description }}
		</p>
		<p>
			Telefono:
			{{ $bar->phone }}
		</p>
		<p>
			Email:
			{{ $bar->email }}
		</p>
		<p>
			Latitud:
			{{ $bar->lat }}
		</p>
		<p>
			Longitud:
			{{ $bar->lng }}
		</p>
			@if ($bar->enabled)
				<div class="alert alert-info">
					Bar habilitado
				</div>
			@else
				<div class="alert alert-danger">
					Bar deshabilitado
				</div>
			@endif
		</div>
		<div class="container">
			<div class="form-group">
				{!! Form::open(['method' => 'GET', 'route' => ['bar.edit', $bar->id]]) !!}
					{{ Form::button('Editar', array('class' => 'btn btn-info', 'type' => 'submit')) }}
				{!! Form::close() !!}
			</div>

		    <div class="form-group">
				{!! Form::open(['method' => 'DELETE', 'route' => ['bar.destroy', $bar->id]]) !!}
					{{ Form::button('Eliminar', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
				{!! Form::close() !!}
			</div>
		</div>

		</p>
	</div>

@endsection