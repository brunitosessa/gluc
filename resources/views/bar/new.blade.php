@extends('bar.template')

@section('content')

{!! Form::model($bar, ['action' => 'BarsController@create']) !!}
{!! Form::close() !!}

@endsection