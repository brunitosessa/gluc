@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')

  <h3>Editar horarios</h3>

  {!! Form::model($businessHours, ['route' => ['businessHours.update', $promotion->id], 'method' => 'PATCH', 'files' => true]) !!}
  	@foreach($businessHours as $businessHours)
    <div class="form-group">
      {!! Form::label('date', 'Dia de la semana') !!}
      {!! Form::text('date', old('date'), ['class' => 'form-control']) !!}
    
      {!! Form::label('start_time', 'Hora inicio') !!}
      {!! Form::text('start_time', old('start_time'), ['class' => 'form-control']) !!}
    
      {!! Form::label('end_time', 'Hora fin') !!}
      {!! Form::text('end_time', old('end_time'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {{ Form::button('Editar', array('class' => 'btn btn-success', 'type' => 'submit')) }}
    </div>
    @endforeach
  {!! Form::close() !!}

@endsection
@endsection