@extends('layouts.app')

@section('content')
	<h3>Editar bar</h3>

	{!! Form::model($bar, ['route' => ['bar.update', $bar->id], 'method' => 'PATCH']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('city', 'City') !!}
      {!! Form::number('city', old('city->name'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('address', 'Address') !!}
      {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('description', 'Description') !!}
      {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('phone', 'Phone') !!}
      {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email', 'Email') !!}
      {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('lat', 'Lat') !!}
      {!! Form::number('lat', old('lat'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('lng', 'Lng') !!}
      {!! Form::number('lng', old('lng'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('enabled', 'Enabled') !!}
      {!! Form::checkbox('enabled', '1', old('enabled')) !!}
    </div>

	<button class="btn btn-sucess" type="submit">Save</button>
@endsection