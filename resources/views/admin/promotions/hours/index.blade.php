@extends('admin.layouts.app')

@section('content')

  <h3>Horarios de promoción</h3>
  
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
        @foreach($promotionHours as $promotionHour)
          <tr>
            <td>
              @if ($promotionHour->enabled)
                <i class="fas fa-check text-success"></i>
              @else
                <i class="fas fa-times text-danger"></i>
              @endif
            </td>
            <td>{{ $dow[$promotionHour->date] }}</td>
            <td>{{ $promotionHour->start_time }}</td>
            <td>{{ $promotionHour->end_time }}</td>
            <td>
              <button class="btn" data-toggle="modal" data-target="#updatePromotionHourModal-{{ $promotionHour->id }}"><i class="fas fa-pen"></i></button>
              <!-- I need one modal per promotionHour -->
              <!--Modal Edit promotionHour -->
              @include('admin.promotions.hours.edit')
            </td>
            <td>
              {!! Form::open([
                'route' => [
                  'admin.bars.promotions.hours.destroy', $promotionHour->promotion->bar->id, $promotionHour->id],
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
    <a class="btn btn-info text-white fixed-bottom" data-toggle="modal" data-target="#promotionHoursModal">Nuevo Horario</a>
  </div>
  @include('admin.promotions.hours.create')
@endsection