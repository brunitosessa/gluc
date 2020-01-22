@extends('layouts.app')

@section('content')
	<div class="card" style="width:300px">
		<img class="card-img-top" src="/storage/images/promotions/{{ $promotion->image }}" alt="Card image">
		<div class="card-body">
			<h4 class="card-title">{{ $promotion->title }}</h4>
			<p class="card-text">{{ $promotion->description }}</p>
			@if($promotion->happy_hour)
				<p class="alert alert-warning">
					Es Happy Hour
				</p>
			@endif

			<p>
				@if($promotion->enabled)
					<button class="btn btn-success">
						<i class="fas fa-check"></i>
						<br>Habilitada
					</button>
					
				@else
					<button class="btn btn-danger">
						<i class="fas fa-times"></i>
						<br>Deshabilitada
					</button>
					
				@endif

				@if($promotion->exclusive)
					<button class="btn btn-success">
						<i class="fas fa-star"></i>
						<br>Exclusiva Gluc
					</button>
				@endif
			</p>

			<a href="{{ route('promotions.edit', $promotion->id) }}" class="btn btn-info text-white">
				<i class="fas fa-pen"></i>
				<br>Editar
			</a>
		</div>
	</div>
@endsection

