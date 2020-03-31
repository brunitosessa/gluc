@extends('admin.layouts.app')

@section('content')
	<div class="container d-lg-inline-flex justify-content-between">
		<!-- Image -->
		<div>
			<img src="/storage/images/bars/{{ $bar->image }}" class="img-fluid rounded mx-auto d-block" width=450>
		</div>

		<hr class="d-sm d-md">

		<div class="flex-fill ml-5">
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

		<!-- Logo -->
		<div>
			<img src="/storage/images/bars/logos/{{ $bar->logo }}" class="img-fluid rounded-circle" width="80">
		</div>
	</div>

	<div class="container mt-2">
		@if($bar->enabled)
			<div class="alert alert-info">
				Bar habilitado
			</div>
		@else
			<div class="alert alert-danger">
				Bar deshabilitado
			</div>
		@endif

		@if($bar->happygluc()->exists() && $bar->happygluc->enabled)
			<div class="alert alert-success">
				Happy Gluc Habilitado
			</div>
		@else
			<div class="alert alert-warning">
				Happy Gluc Desabilitado
			</div>
		@endif			
	</div>

	<div class="container">	   
		<div class="form-group float-left ml-2">
			<a class="btn btn-secondary" href="{{ route('admin.bars.businessHours.index', [ 'b_id' => $bar->id ]) }}">
				<i class="fas fa-clock fa-2x"></i>
				<br>Horarios
			</a>

			<a class="btn btn-success" href="{{ route('admin.bars.promotions.index', [ 'b_id' => $bar->id ]) }}">
				<i class="fas fa-fire-alt fa-2x"></i>
				<br>Promociones
			</a>

			<a class="btn btn-info text-white" href="{{ route('admin.bars.happyhours.index', [ 'b_id' => $bar->id ]) }}">
				<i class="fas fa-cocktail fa-2x"></i>
				<br>Happy Hour
			</a>

			<a class="btn btn-dark text-white" data-toggle="modal" data-target="#happyglucModal">
				<i class="fas fa-star fa-2x"></i>
				<br>Happy Gluc
			</a>

			<!--Modal Happy Gluc -->
			@include('admin.happyglucs.index')
		</div>
		<div class="float-right">
			<a href="{{ route('admin.bars.edit', [ 'id' => $bar->id ]) }}" class="btn btn-info text-white">
				<i class="fas fa-pen fa-2x"></i>
				<br>Editar
			</a>
		</div>
	</div>
@endsection