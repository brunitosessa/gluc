@extends('layouts.app')

@section('content')

	<h3>Editar publicidad</h3>

	{!! Form::model($publicity, ['route' => ['publicities.update', $publicity->id], 'method' => 'PATCH', 'files' => true]) !!}

    <div class="mb-4 text-center">
      {!! Html::image('/storage/images/publicities/'.$publicity->image, 'Publicity image', ['class' => 'img-fluid rounded', 'width' => 250]) !!}
    </div>

    <div class="form-group">
      {!! Form::file('image',['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('title', 'Titulo') !!}
      {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('description', 'Descripcion') !!}
      {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('city_id', 'Ciudad') !!}
      {{ Form::select('city_id', $cities, old('city_id'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {!! Form::label('enabled', 'Habilitado') !!}
      {!! Form::hidden('enabled',0) !!}
      {!! Form::checkbox('enabled', '1', old('enabled')) !!}
    </div>

    <div class="form-group">
      {!! Form::label('end_date', 'Fecha') !!}
      {{ Form::date('end_date', old('end_date'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::button('Guardar', array('class' => 'btn btn-success', 'type' => 'submit')) }}
    </div>

  {!! Form::close() !!}

  
@endsection