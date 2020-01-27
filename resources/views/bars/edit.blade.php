@extends('layouts.app')

@section('content')

	<h3>Editar bar</h3>

	{!! Form::model($bar, ['route' => ['bars.update', $bar->id], 'method' => 'PATCH', 'files' => true]) !!}
    <!-- Image -->
    <div class="mb-4 text-center">
      {!! Html::image('/storage/images/bars/'.$bar->image, 'Bar image', ['class' => 'img-fluid rounded', 'width' => 250]) !!}
    </div>

    <div class="form-group">
      {!! Form::file('image',['class' => 'form-control']) !!}
    </div>

    <!-- Logo -->
    <div class="mb-4 text-center">
      {!! Html::image('/storage/images/bars/logos/'.$bar->logo, 'Bar logo', ['class' => 'img-fluid rounded', 'width' => 80]) !!}
    </div>

    <div class="form-group">
      {!! Form::file('logo',['class' => 'form-control']) !!}
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
  <div class="modal fade" id="happyglucModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> 
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Happy Gluc</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Happy Gluc -->
            {!! Form::model($bar->happygluc, ['route' => ['happygluc.store']]) !!}
            <div class="form-group">
              ¿Quieres ofrecer Happy Gluc?
              <input type="checkbox" checked data-toggle="toggle" data-size="sm">
            </div>

            <div class="form-group">
              {!! Form::label('quantity', 'Cantidad') !!}
              {!! Form::number('quantity', old('frequency'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('frequency', '¿Cada cuantos días?') !!}
              {!! Form::number('frequency', old('frequency'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('exclusive', '¿Es exclusivo?') !!}
              {!! Form::hidden('exclusive',0) !!}
              {!! Form::checkbox('exclusive', '1', old('exclusive')) !!}
            </div>

            <div class="form-group">
              {!! Form::label('enabled', 'Habilitado') !!}
              {!! Form::hidden('enabled',0) !!}
              {!! Form::checkbox('enabled', '1', old('enabled')) !!}
            </div>

            <div class="form-group">
              
            </div>
            {{ Form::button('Guardar', array('class' => 'btn btn-success float-right', 'type' => 'submit')) }}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection