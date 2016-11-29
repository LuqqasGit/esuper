@extends('back.master')

@section('title')
    Crear Nuevo Market
@endsection

@section('content')

    {!! Form::open(['route' => 'market.store', 'files' => true]) !!}
    {{-- Agregar un select para asociar product con Market --}}
    <h2>Crear nuevo market</h2>

    @include('back.markets.form')

    {{ Form::submit('Crear Market', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

@endsection

{{-- meterle plugin de jquery para validacion frontend --}}