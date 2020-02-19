@extends('layouts.app')

@section('content')

  <h3>Crear promoción</h3>

  {!! Form::open(['route' => ['admin.bars.promotions.store', $bar->id ], 'files' => true]) !!}

    <div class="mb-4 text-center">
      {!! Html::image('/storage/images/publicities/default.jpg', 'Publicity image', ['class' => 'img-fluid img-thumbnail rounded', 'width' => 250]) !!}
    </div>

    <div class="form-group">
      {!! Form::file('image',['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('title', 'Titulo') !!}
      {!! Form::text('title', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('description', 'Descripcion') !!}
      {!! Form::text('description', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('happy_hour', 'Es Happy Hour?') !!}
      {!! Form::hidden('happy_hour',0) !!}
      {!! Form::checkbox('happy_hour', '1', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('enabled', 'Habilitado') !!}
      {!! Form::hidden('enabled',0) !!}
      {!! Form::checkbox('enabled', '1', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('exclusive', 'Es exclusivo?') !!}
      {!! Form::hidden('exclusive',0) !!}
      {!! Form::checkbox('exclusive', '1', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {{ Form::button('Crear', array('class' => 'btn btn-success', 'type' => 'submit')) }}
    </div>

  {!! Form::close() !!}

@endsection