@extends('layouts.app')

@section('content')
	<h3>Listado de bares</h3>

    <div class="form-group">
	    {!! Form::search('name', '', ['class' => 'form-control']) !!}
	</div>
	
	<div class="card-columns">
		@foreach($bars as $bar)
		<div class="card" style="width:250px">
			<img class="card-img-top" src="/storage/images/bars/{{ $bar->image }}" alt="Card image">
			<div class="card-body">
				<h4 class="card-title"><a href="{{ route('bars.show', $bar->id) }}">{{ $bar->name }}</a>
	</h4>
				<p class="card-text">Some example text.</p>
				<a href="#" class="btn btn-primary">See Profile</a>
			</div>

		</div>
		@endforeach
	</div>

	<div class="d-flex flex-row-reverse">
		{!! $bars->render() !!}
	</div>

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('bars.create') }}" class="btn btn-info text-white">Nuevo</a>
	</div>
@endsection