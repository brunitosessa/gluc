@extends('layouts.app')

@section('content')

  <h3>Horarios de promoción</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Habilitado</th>
        <th scope="col">Día de la semana</th>
        <th scope="col">Apertura</th>
        <th scope="col">Cierre</th>
        <th scope="col">Guardar</th>
      </tr>
    </thead>
  </table>
  
  @foreach($promotionHours as $promotionHour)
    {!! Form::model($promotionHour, ['route' => ['promotions.hours.update', $promotionHour->id], 'method' => 'PATCH']) !!}
      <table class="table">
        <tr>
          <td>
            {!! Form::hidden('enabled',0) !!}
            {!! Form::checkbox('enabled', '1', old('enabled')) !!}
          </td>
          <td>
            {!! Form::select('date', $dow, old('date'), ['class' => 'form-control']) !!}
          </td>
          <td>
            {!! Form::time('start_time', old('start_time'), ['class' => 'form-control']) !!}
          </td>
          <td>
            {!! Form::time('end_time', old('end_time'), ['class' => 'form-control']) !!}
          </td>
          
          <td>
            <button class="btn btn-success">
              <i class="fas fa-check"></i>
            </button>
          </td>
        </tr>
      </table>
    {!! Form::close() !!}
  @endforeach

  <div class="d-flex flex-row-reverse">
    <a class="btn btn-info text-white" data-toggle="modal" data-target="#promotionHoursModal">Nuevo</a>
  </div>
  @include('promotions.hours.create')
@endsection