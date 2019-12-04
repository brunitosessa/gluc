@extends('layouts.app')

@section('content')
	<h3>Editar bar</h3>

	{!! Form::model($bar, ['route' => ['bar.update', $bar->id], 'method' => 'PATCH']) !!}
    <div class="form-group">
      {!! Form::label('nombre', 'Nombre') !!}
      {!! Form::text('nombre', old('nombre'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('localidad', 'Localidad') !!}
      {!! Form::number('localidad', old('localidad'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('direccion', 'Direccion') !!}
      {!! Form::text('direccion', old('direccion'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('descripcion', 'Descripcion') !!}
      {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('telefono', 'Telefono') !!}
      {!! Form::text('telefono', old('telefono'), ['class' => 'form-control']) !!}
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
      {!! Form::label('habilitado', 'Habilitado') !!}
      {!! Form::checkbox('habilitado', '1', old('habilitado')) !!}
    </div>

	<button class="btn btn-sucess" type="submit">Guardar</button>
@endsection