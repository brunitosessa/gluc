@extends('layouts.app')

@section('content')
<div id="bar">
	<h3>Editar bar</h3>

	{!! Form::model($bar, ['route' => ['bars.update', $bar->id], 'method' => 'PATCH', 'files' => true]) !!}
    <!-- Image -->
    <div class="mb-4 text-center">
      <img src="/storage/images/bars/{{ $bar->image }}" alt="Bar Image", class="img-fluid rounded" width=250 @click="abrirImagen()">
      
      {!! Html::image('/storage/images/bars/logos/'.$bar->logo, 'Bar logo', ['class' => 'img-fluid rounded-circle float-right', 'width' => 80]) !!}
    </div>

    <div class="form-group d-none">
      {!! Form::file('image', [ 'ref' => 'fileImage']) !!}
      {!! Form::file('logo') !!}
    </div>

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

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#happyglucModal">
    ¿Habilitar Happy Gluc?
  </button>

  @include('happyglucs.index')
</div>
@endsection