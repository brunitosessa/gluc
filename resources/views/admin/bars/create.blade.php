@extends('layouts.app')

@section('content')

  <h3>Crear bar</h3>

  <div class="container">
  {!! Form::open(['action' => 'Admin\AdminBarController@store', 'files' => true]) !!}

    <div class="mb-4 text-center">
      {!! Html::image('/storage/images/bars/default.jpg', 'Bar image', ['class' => 'img-fluid img-thumbnail rounded', 'width' => 250]) !!}
    </div>

    <div class="mb-4">
      {!! Html::image('/storage/images/bars/logos/default.jpg', 'Bar image', ['class' => 'img-fluid img-thumbnail rounded-circle float-right', 'width' => 80]) !!}
    </div>

    <div class="form-group">
      {!! Form::file('image',['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::file('logo',['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('name', 'Nombre') !!}
      {!! Form::text('name', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('password', 'Contraseña') !!}
      {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('city_id', 'Ciudad') !!}
      {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {!! Form::label('address', 'Direccion') !!}
      {!! Form::text('address', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('description', 'Descripcion') !!}
      {!! Form::text('description', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('phone', 'Telefono') !!}
      {!! Form::text('phone', '', ['class' => 'form-control']) !!}
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
      {!! Form::label('enabled', 'Habilitado') !!}
      {!! Form::hidden('enabled',0) !!}
      {!! Form::checkbox('enabled', '1', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {{ Form::button('Crear', array('class' => 'btn btn-success', 'type' => 'submit')) }}
    </div>

  {!! Form::close() !!}
  </div>

@endsection