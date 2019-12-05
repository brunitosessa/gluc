@extends('layouts.app')

@section('content')

{!! Form::model($bar, ['action' => 'BarsController@store']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('city_id', 'City') !!}
      {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {!! Form::label('address', 'Address') !!}
      {!! Form::text('address', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('description', 'Description') !!}
      {!! Form::text('description', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('phone', 'Phone') !!}
      {!! Form::text('phone', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email', 'Email') !!}
      {!! Form::email('email', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('lat', 'Lat') !!}
      {!! Form::number('lat', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('lng', 'Lng') !!}
      {!! Form::number('lng', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('enabled', 'Enabled') !!}
      {!! Form::checkbox('enabled', '1', ['class' => 'form-control']) !!}
    </div>

	<button class="btn btn-sucess" type="submit">Create</button>
{!! Form::close() !!}

@endsection