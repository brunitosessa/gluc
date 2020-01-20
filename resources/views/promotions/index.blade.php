@extends('layouts.app')

@section('content')
	<h3>Listado de Promociones</h3>

    <div class="form-group">
	    {!! Form::search('name', '', ['class' => 'form-control']) !!}
	</div>
	
	<div class="card-columns">
		@foreach($promotions as $promotion)
		<div class="card" style="width:250px">
			<img class="card-img-top" src="/storage/images/promotions/{{ $promotion->image }}" alt="Card image">
			<div class="card-body">
				<h4 class="card-title"><a href="{{ route('bars.promotions.show', ['id' => $promotion->id, 'bar_id' => $bar_id]) }}">{{ $promotion->title }}</a>
	</h4>
				<p class="card-text" style="word-wrap: break-word;">{{ $promotion->description }}</p>
				<a href="{{ route('bars.promotions.show', ['id' => $promotion->id, 'bar_id' => $bar_id]) }}" class="btn btn-primary">Ver</a>
			</div>
		</div>
		@endforeach
	</div>

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('bars.promotions.create', ['bar_id' => $bar_id]) }}" class="btn btn-info text-white">Nuevo</a>
	</div>
@endsection