@extends('layouts.app')

@section('content')
	<h3>Editar bar</h3>

	{!! Form::model($bar, ['route' => ['bar.update', $bar->id], 'method' => 'PATCH']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Nombre') !!}
      {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('city_id', 'Ciudad') !!}
      {{ Form::select('city_id', $cities, old('city_id'), ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {!! Form::label('address', 'Direccion') !!}
      {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('description', 'Descripcion') !!}
      {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('phone', 'Telefono') !!}
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
      {!! Form::label('enabled', 'Habilitado') !!}
      {!! Form::hidden('enabled',0) !!}
      {!! Form::checkbox('enabled', '1', old('enabled')) !!}
    </div>
    <div class="form-group">
      {{ Form::button('Guardar', array('class' => 'btn btn-success', 'type' => 'submit')) }}
    </div>
  {!! Form::close() !!}
@endsection