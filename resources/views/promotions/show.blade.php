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

			@if($promotion->enabled)
				<button class="btn btn-success">
					<i class="fas fa-check fa-2x"></i>
					<br>Habilitada
				</button>
				
			@else
				<button class="btn btn-danger">
					<i class="fas fa-times fa-2x"></i>
					<br>Deshabilitada
				</button>
				
			@endif

			@if($promotion->exclusive)
				<button class="btn btn-success">
					<i class="fas fa-star fa-2x"></i>
					<br>Exclusiva Gluc
				</button>
			@endif
		</div>
	</div>
@endsection

