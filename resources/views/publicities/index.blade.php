@extends('layouts.app')

@section('content')
	<h3>Listado de publicidades</h3>

    <div class="form-group">
	    {!! Form::search('name', '', ['class' => 'form-control']) !!}
	</div>
	
	<div class="card-columns">
		@foreach($publicities as $publicity)
		<div class="card" style="width:250px">
			<img class="card-img-top" src="/storage/images/publicities/{{ $publicity->image }}" alt="Card image">
			<div class="card-body">
				<h4 class="card-title"><a href="{{ route('publicities.show', $publicity->id) }}">{{ $publicity->title }}</a>
	</h4>
				<p class="card-text">{{ $publicity->city->name }}</p>
				<a href="#" class="btn btn-primary">See Profile</a>
			</div>

		</div>
		@endforeach
	</div>

	<div class="d-flex flex-row-reverse">
		{!! $publicities->render() !!}
	</div>

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('publicities.create') }}" class="btn btn-info text-white">Nuevo</a>
	</div>
@endsection