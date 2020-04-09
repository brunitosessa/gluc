@extends('layouts.app')

@section('content')

  <h3>Horarios</h3>

  <div class="table-responsive text-nowrap pt-2">
    <table class="table table-striped table-hover text-center">
      <thead>
        <th>Habilitado</th>
        <th>Día</th>
        <th>Apertura</th>
        <th>Cierre</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </thead>

      <tbody>
        @foreach($businessHours as $businessHour)
          <tr>
            <td>
              @if ($businessHour->enabled)
                <i class="fas fa-check text-success"></i>
              @else
                <i class="fas fa-times text-danger"></i>
              @endif
            </td>
            <td>{{ $dow[$businessHour->date] }}</td>
            <td>{{ $businessHour->start_time }}</td>
            <td>{{ $businessHour->end_time }}</td>
            <td>
              <button class="btn" data-toggle="modal" data-target="#updateBusinessHourModal-{{ $businessHour->id }}"><i class="fas fa-pen"></i></button>
              <!-- I need one modal per businessHour -->
              <!--Modal Edit BusinessHour -->
              @include('businessHours.edit')
            </td>
            <td>
              {!! Form::open([
                'route' => ['bars.businessHours.destroy', $businessHour->id],
                'method' => 'DELETE'
              ]) !!}
                <button type="submit" class="btn"><i class="fas fa-trash"></i></button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div>
    <a class="btn btn-info text-white fixed-bottom" data-toggle="modal" data-target="#businessHoursModal">Nuevo Horario</a>
  </div>
  @include('businessHours.create')

@endsection