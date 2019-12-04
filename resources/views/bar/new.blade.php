@extends('layouts.app')

@section('content')

{!! Form::model($bar, ['action' => 'BarsController@create']) !!}
    <div class="form-group">
      {!! Form::label('nombre', 'Nombre') !!}
      {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('localidad', 'Localidad') !!}
      {!! Form::number('localidad', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('direccion', 'Direccion') !!}
      {!! Form::text('direccion', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('descripcion', 'Descripcion') !!}
      {!! Form::text('descripcion', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('telefono', 'Telefono') !!}
      {!! Form::text('telefono', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email', 'Email') !!}
      {!! Form::email('email', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('lat', 'Lat') !!}
      {!! Form::number('lat', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('lng', 'Lng') !!}
      {!! Form::number('lng', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('habilitado', 'Habilitado') !!}
      {!! Form::checkbox('habilitado', '1', ['class' => 'form-control']) !!}
    </div>

	<button class="btn btn-sucess" type="submit">Guardar</button>
{!! Form::close() !!}

@endsection