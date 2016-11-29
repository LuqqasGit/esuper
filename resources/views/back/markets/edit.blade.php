@extends('back.master')

@section('title')
    Editar Market
@endsection

@section('content')

{!! Form::model($market, ['method' => 'PATCH', 'route' => ['market.update', 'id' => $market->id]]) !!}

    <h2>Editar Market: {{ $name }} - {{ $market->address }}</h2>

    @include('back.markets.form')

    {{ Form::submit('Editar Market', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}

@endsection