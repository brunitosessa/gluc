@extends('admin.layouts.app')

@section('content')
	<div class="container row mb-2">
		<div class="col">
			<h3 class="col">Pizzaron de cervezas</h3>
		</div>
		<div class="text-right col">
			<img src="/storage/images/bars/logos/{{ $bar->logo }}" class="img-fluid rounded-circle" width="50">
			<span class="text-info"><b>{{ $bar->name }}</b></span>
		</div>
	</div>

	<div class="table-responsive text-nowrap">
		<table class="table table-striped table-hover w-auto">
			<thead>
				<th>Nombre</th>
				<th>Estilo</th>
				<th>Descripcion</th>
				<th>Productor</th>
				<th>Color</th>
				<th>IBU</th>
				<th>Alcohol</th>
				<th>Precio</th>
				<th>Precio HH</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</thead>
			<tbody>
				@foreach($beers as $beer)
				<tr>
					<td>{{ $beer->name }}</td>
					<td>{{ $beer->style }}</td>
					<td>{{ $beer->description }}</td>
					<td>{{ $beer->brand }}</td>
					<td>{{ $beer->color }}</td>
					<td>{{ $beer->ibu }}</td>
					<td>{{ $beer->alcohol }}</td>
					<td>$ {{ $beer->price }}</td>
					<td>$ {{ $beer->happyhour_price }}</td>
					<td>
						<button class="btn" data-toggle="modal" data-target="#updateBeerModal-{{ $beer->id }}"><i class="fas fa-pen"></i></button>
						<!-- I need one modal per beer -->
						<!--Modal Edit Beer -->
						@include('admin.beers.edit')
					</td>
					<td>
						{!! Form::open([
							'route' => ['admin.bars.beers.destroy', $beer->id, $beer->bar->id],
							'method' => 'DELETE'
						]) !!}
							<button type="submit" class="btn"><i class="fas fa-trash"></i></button>
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="d-flex flex-row-reverse" data-toggle="modal" data-target="#newBeerModal">
		<button class="btn btn-block btn-info text-white fixed-bottom">Nuevo</button>
	</div>

	<!--Modal New Beer -->
	@include('admin.beers.create')
@endsection