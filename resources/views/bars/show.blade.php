@extends('layouts.app')

@section('content')
	<div class="container clearfix">
		<div class="float-right">
			<img src="/storage/images/bars/logos/{{ $bar->logo }}" class="img-fluid rounded-circle" width="80">
		</div>

		<div class="float-left">
			<img src="/storage/images/bars/{{ $bar->image }}" class="img-fluid rounded" width="250">
		</div>

		<div class="float-left ml-5">
			<p>
				<b>Nombre</b>
				{{ $bar->name }}
			</p>
			<p>
				<b>Localidad</b>
				{{ $bar->city->name }}
			</p>
			<p>
				<b>Direccion</b>
				{{ $bar->address }}
			</p>
			<p>
				<b>Descripcion</b>
				{{ $bar->description }}
			</p>
			<p>
				<b>Telefono</b>
				{{ $bar->phone }}
			</p>
			<p>
				<b>Email</b>
				{{ $bar->email }}
			</p>
			<p>
				<b>Latitud</b>
				{{ $bar->lat }}
			</p>
			<p>
				<b>Longitud</b>
				{{ $bar->lng }}
			</p>
		</div>
	</div>

	<div class="container mt-2">
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
		<div class="form-group float-left ml-2">
			
				<a class="btn btn-success" href="{{ route('bars.promotions.index', ['bar_id' => $bar->id]) }}">
					<i class="fas fa-fire-alt fa-2x"></i>
					<br>Promociones
				</a>
				<a class="btn btn-dark" href="#">
					<i class="fas fa-star fa-2x"></i>
					<br>Especiales
				</a>
			
		</div>

		<div class="form-group float-right ml-2">
			{!! Form::open(['method' => 'DELETE', 'route' => ['bars.destroy', $bar->id]]) !!}
				{{ Form::button('Eliminar', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
			{!! Form::close() !!}
		</div>

		<div class="form-group float-right ml-2">
			{!! Form::open(['method' => 'GET', 'route' => ['bars.edit', $bar->id]]) !!}
				{{ Form::button('Editar', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection