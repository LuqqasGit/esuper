@extends('back.master')

@section('title')
    Create Market
@endsection

@section('content')

    {!! Form::open(['route' => 'product.store', 'files' => true]) !!}
    {{-- Agregar un select para asociar product con Market --}}
    <h2>Create new product</h2>

    @include('back.products.form')

    {{ Form::submit('Create Product', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

@endsection

{{-- meterle plugin de jquery para validacion frontend --}}