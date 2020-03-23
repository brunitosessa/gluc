@extends('admin.layouts.app')

@section('content')

  <h3>Horarios</h3>
  <div class="alert alert-info row align-items-center text-center">
    <div class="col">Habilitado</div>
    <div class="col">Día</div>
    <div class="col">Apertura</div>
    <div class="col">Cierre</div>
    <div class="col">Guardar</div>
    <div class="col">Eliminar</div>
  </div>
  
  @foreach($businessHours as $businessHour)

    {!! Form::model($businessHour, ['route' => ['admin.bars.businessHours.update', $businessHour->id], 'method' => 'PATCH' , 'class' => 'form-inline']) !!}
    <div class="container-fluid row align-items-center text-center my-2">
      <div class="col">
        {!! Form::hidden('enabled',0) !!}
        {!! Form::checkbox('enabled', '1', old('enabled')) !!}
      </div>
      <div class="col">
        {!! Form::select('date', $dow, old('date'), ['class' => 'form-control']) !!}
      </div>
      <div class="col">
        {!! Form::time('start_time', old('start_time'), ['class' => 'form-control']) !!}
      </div>
      <div class="col">
        {!! Form::time('end_time', old('end_time'), ['class' => 'form-control']) !!}
      </div>
      <div class="col">
        <button class="btn btn-success">
          <i class="fas fa-check"></i>
        </button>
      </div>
      {!! Form::close() !!}
      <div class="col">
       {!! Form::open(['method' => 'DELETE', 'route' => ['admin.bars.businessHours.destroy', $businessHour->id]]) !!}
         {{ Form::button("Eliminar", array('class' => 'btn btn-danger', 'type' => 'submit')) }}
       {!! Form::close() !!}
      </div>
    </div>

  @endforeach

  <div>
    <a class="btn btn-info text-white fixed-bottom" data-toggle="modal" data-target="#businessHoursModal">Nuevo Horario</a>
  </div>
  @include('admin.businessHours.create')


@endsection