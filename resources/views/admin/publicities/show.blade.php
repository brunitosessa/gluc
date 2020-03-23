@extends('admin.layouts.app')

@section('content')
	<div class="container clearfix">
		<div class="float-left">
			<img src="/storage/images/publicities/{{ $publicity->image }}" class="img-fluid rounded" width="250">
		</div>

		<div class="float-left ml-5">
			<p>
				<b>Titulo</b>
				{{ $publicity->title }}
			</p>
			<p>
				<b>Descripcion</b>
				{{ $publicity->description }}
			</p>
			<p>
				<b>Localidad</b>
				{{ $publicity->city->name }}
			</p>
			<p>
				<b>Valido hasta</b>
				{{ $publicity->end_date }}
			</p>
		</div>
	</div>

	<div class="container mt-2">
		@if ($publicity->enabled)
			<div class="alert alert-info">
				Publicidad habilitada
			</div>
		@else
			<div class="alert alert-danger">
				Publicidad deshabilitada
			</div>
		@endif
	</div>

	<div class="container">	    
		<div class="form-group float-right ml-2">
			{!! Form::open(['method' => 'DELETE', 'route' => ['admin.publicities.destroy', $publicity->id]]) !!}
				{{ Form::button('Eliminar', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
			{!! Form::close() !!}
		</div>

		<div class="form-group float-right ml-2">
			{!! Form::open(['method' => 'GET', 'route' => ['admin.publicities.edit', $publicity->id]]) !!}
				{{ Form::button('Editar', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection