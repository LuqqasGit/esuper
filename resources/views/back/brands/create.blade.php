@extends('back.master')

@section('title')
    Crear nueva cadena
@endsection

@section('content')

    {!! Form::open(['route' => 'brand.store', 'files' => true]) !!}
    <h2>Crear nueva cadena</h2>

    <div class="form-group">
        {{ Form::label('name', 'Nombre:')  }}
        {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::file('brand_image', ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Crear Cadena', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

@endsection

