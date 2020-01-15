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
				<h4 class="card-title">{{ $publicity->title }}</h4>
				<p class="card-text">{{ $publicity->city->name }}</p>
				<a href="{{ route('publicities.show', $publicity->id) }}" class="btn btn-primary">Ver</a>
			</div>

		</div>
		@endforeach
	</div>

	<div class="d-flex flex-row-reverse">
		{!! $publicities->links() !!}
	</div>

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('publicities.create') }}" class="btn btn-info text-white">Nuevo</a>
	</div>
@endsection