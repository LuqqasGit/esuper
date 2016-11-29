@extends('back.master')

@section('title')
    Crear nuevo producto
@endsection

@section('content')

    {!! Form::open(['route' => 'product.store', 'files' => true]) !!}
    {{-- Agregar un select para asociar product con Market --}}
    <h2>Crear nuevo producto</h2>

    @include('back.products.form')

    {{ Form::submit('Crear Producto', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

@endsection

{{-- meterle plugin de jquery para validacion frontend --}}