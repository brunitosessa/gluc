@extends('layouts.app')

@section('content')

  <h3>Horarios de promoción</h3>
  <div class="alert alert-info row align-items-center text-center">
    <div class="col">Habilitado</div>
    <div class="col">Día</div>
    <div class="col">Apertura</div>
    <div class="col">Cierre</div>
    <div class="col">Guardar</div>
    <div class="col">Eliminar</div>
  </div>
  
  @foreach($promotionHours as $promotionHour)
    {!! Form::model($promotionHour, ['route' => ['promotions.hours.update', $promotionHour->id], 'method' => 'PATCH', 'class' => 'form-inline']) !!}
      <div class="container-fluid row align-items-center text-center my-2">
      <div class="col-sm">
        {!! Form::hidden('enabled',0) !!}
        {!! Form::checkbox('enabled', '1', old('enabled')) !!}
      </div>
      <div class="col-sm">
        {!! Form::select('date', $dow, old('date'), ['class' => 'form-control']) !!}
      </div>
      <div class="col-sm">
        {!! Form::time('start_time', old('start_time'), ['class' => 'form-control']) !!}
      </div>
      <div class="col-sm">
        {!! Form::time('end_time', old('end_time'), ['class' => 'form-control']) !!}
      </div>
      <div class="col-sm">
        <button class="btn btn-success">
          <i class="fas fa-check"></i>
        </button>
      </div>
    {!! Form::close() !!}
    <div class="col-sm">
       {!! Form::open(['method' => 'DELETE', 'route' => ['promotions.hours.destroy', $promotionHour->id]]) !!}
         {{ Form::button("Eliminar", array('class' => 'btn btn-danger', 'type' => 'submit')) }}
       {!! Form::close() !!}
    </div>
  </div>

  <hr class="d-sm d-md">
  @endforeach

  <div>
    <a class="btn btn-success text-white fixed-bottom" data-toggle="modal" data-target="#promotionHoursModal">Nuevo Horario</a>
  </div>
  @include('promotions.hours.create')
@endsection