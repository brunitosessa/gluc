@extends('admin.layouts.app')

@section('content')

  <h3>Editar promoción</h3>

  {!! Form::model($promotion, ['route' => ['admin.bars.promotions.update', $promotion->id, $bar->id], 'method' => 'PATCH', 'files' => true]) !!}

    <div class="mb-4 text-center">
      {!! Html::image('/storage/images/promotions/'.$promotion->image, 'Publicity image', ['class' => 'img-fluid img-thumbnail rounded', 'width' => 250]) !!}
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
      {!! Form::label('enabled', 'Habilitado') !!}
      {!! Form::hidden('enabled',0) !!}
      {!! Form::checkbox('enabled', '1', old('enabled')) !!}
    </div>

    <div class="form-group">
      {!! Form::label('exclusive', 'Es exclusivo?') !!}
      {!! Form::hidden('exclusive',0) !!}
      {!! Form::checkbox('exclusive', '1', old('exclusive')) !!}
    </div>

    <div class="form-group">
      {{ Form::button('Editar', array('class' => 'btn btn-success', 'type' => 'submit')) }}
    </div>

  {!! Form::close() !!}

@endsection