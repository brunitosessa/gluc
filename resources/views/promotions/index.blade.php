@extends('layouts.app')

@section('content')
	<h3>Listado de Promociones</h3>

    <div class="card-columns mt-5">
		@foreach($promotions as $promotion)
		<div class="card" style="width:250px">
			<img class="card-img-top" src="/storage/images/promotions/{{ $promotion->image }}" alt="Card image">
			<div class="card-body">
				<h4 class="card-title"><a href="{{ route('promotions.show', ['id' => $promotion->id]) }}">{{ $promotion->title }}</a>
	</h4>
				<p class="card-text" style="word-wrap: break-word;">{{ $promotion->description }}</p>
				<a href="{{ route('promotions.show', ['id' => $promotion->id]) }}" class="btn btn-primary">Ver</a>
			</div>
		</div>
		@endforeach
	</div>

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('promotions.create') }}" class="btn btn-info text-white">Nuevo</a>
	</div>
@endsection