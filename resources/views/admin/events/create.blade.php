@extends('admin.layouts.app')

@section('content')

  <h3>Crear evento</h3>

  {!! Form::open(['action' => 'Admin\AdminEventController@store', 'files' => true]) !!}

    <div class="mb-4 text-center">
      {!! Html::image('/storage/images/events/default.jpg', 'Event image', ['class' => 'img-fluid img-thumbnail rounded', 'width' => 250]) !!}
    </div>

    <div class="form-group">
      {!! Form::file('image',['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('title', 'Titulo') !!}
      {!! Form::text('title', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('address', 'Direccion') !!}
      {!! Form::text('address', '', ['class' => 'form-control']) !!}
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
      {!! Form::label('description', 'Descripcion') !!}
      {!! Form::text('description', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('city_id', 'Ciudad') !!}
      {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {!! Form::label('bar_id', 'Bar') !!}
      {!! Form::select('bar_id', ([null => 'Ninguno'] + $bars), null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('enabled', 'Habilitado') !!}
      {!! Form::hidden('enabled',0) !!}
      {!! Form::checkbox('enabled', '1', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('date', 'Fecha') !!}
      {{ Form::date('date', '', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::button('Crear', array('class' => 'btn btn-success', 'type' => 'submit')) }}
    </div>

  {!! Form::close() !!}

@endsection