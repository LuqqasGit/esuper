@extends('back.master')

@section('title')
    Edit Product
@endsection

@section('content')

{!! Form::model($product, ['method' => 'PATCH', 'route' => ['product.update', 'id' => $product->id]]) !!}

    <h2>Edit product: {{ $product->name }}</h2>

    @include('back.products.form')

    {{ Form::submit('Edit product', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}

@endsection