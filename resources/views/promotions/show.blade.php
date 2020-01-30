@extends('layouts.app')

@section('content')
	<div class="card" style="width:300px">
		<img class="card-img-top" src="/storage/images/promotions/{{ $promotion->image }}" alt="Card image">
		<div class="card-body">
			<h4 class="card-title">{{ $promotion->title }}</h4>
			<p class="card-text">{{ $promotion->description }}</p>

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

			<div>
				<a class="btn btn-secondary" href="{{ route('promotions.hours.index', [ 'id' => $promotion->id ]) }}">
					<i class="fas fa-clock"></i>
					<br>Horarios
				</a>

				<a href="{{ route('promotions.edit', $promotion->id) }}" class="btn btn-info text-white float-right">
					<i class="fas fa-pen"></i>
					<br>Editar
				</a>
			</div>
		</div>
	</div>
@endsection

