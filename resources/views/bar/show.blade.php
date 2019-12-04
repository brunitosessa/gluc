@extends('layouts.app')

@section('content')
	<div class="container">
		<p>
			Nombre:
			{{ $bar->nombre }}
		</p>
		<p>
			Localidad:
			{{ $bar->localidad }}
		</p>
		<p>
			Direccion:
			{{ $bar->direccion }}
		</p>
		<p>
			Descripcion:
			{{ $bar->descripcion }}
		</p>
		<p>
			Telefono:
			{{ $bar->telefono }}
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
			@if ($bar->habilitado)
				<div class="alert alert-info">
					Bar habilitado
				</div>
			@else
				<div class="alert alert-danger">
					Bar deshabilitado
				</div>
			@endif
		</div>
	</div>

@endsection