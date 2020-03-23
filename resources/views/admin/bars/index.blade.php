@extends('admin.layouts.app')

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
				<h4 class="card-title">
					{{ $bar->name }}
					<img src="/storage/images/bars/logos/{{ $bar->logo }}" class="img-fluid rounded-circle float-right" width="50">
				</h4>
				<p class="card-text">{{ $bar->city->name }}</p>
				<a href="{{ route('admin.bars.show', $bar->id) }}" class="btn btn-primary">Ver</a>
			</div>

		</div>
		@endforeach
	</div>

	<div class="d-flex flex-row-reverse">
		{!! $bars->links() !!}
	</div>

	<div class="d-flex flex-row-reverse">
		<a href="{{ route('admin.bars.create') }}" class="btn btn-info text-white fixed-bottom">Nuevo</a>
	</div>
@endsection