@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex">
		<div>
			<img class="img-fluid rounded" src="/storage/images/promotions/{{ $promotion->image }}" alt="Card image" width="250">
		</div>
		<div class="flex-fill ml-5">
			<p>
				<b>Promocion</b>
				{{ $promotion->title }}
			</p>
			<p>
				<b>Descripcion</b>
				{{ $promotion->description }}
			</p>

			@if($promotion->happy_hour)
				<div class="alert alert-warning">
					<i class="fas fa-glass-cheers"></i>
					Es Happy Hour
				</div>
			@endif

			@if($promotion->exclusive)
				<div class="alert alert-info">
					<i class="fas fa-star"></i>
					Exclusiva Gluc
				</div>
			@endif
		</div>
	</div>

	<div class="mt-2">
		@if($promotion->enabled)
			<div class="alert alert-success">
				<i class="fas fa-check"></i>
				Habilitada
			</div>							
		@else
			<div class="alert alert-danger">
				<i class="fas fa-times"></i>
				Deshabilitada
			</div>							
		@endif

		<a class="btn btn-secondary" href="{{ route('admin.bars.promotions.hours.index', [ 'b_id' => $bar->id, 'p_id' => $promotion->id ]) }}">
			<i class="fas fa-clock"></i>
			<br>Horarios
		</a>

		<a href="{{ route('admin.bars.promotions.edit', [ 'b_id' => $bar->id, 'p_id' => $promotion->id ]) }}" class="btn btn-info text-white float-right">
			<i class="fas fa-pen"></i>
			<br>Editar
		</a>
	</div>
</div>
@endsection

