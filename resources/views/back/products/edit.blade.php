@extends('back.master')

@section('title')
    Editar Producto
@endsection

@section('content')

{{ Form::model($product, ['method' => 'PATCH', 'route' => ['product.update', 'id' => $product->id]]) }}

    <h2>Editar producto: {{ $product->name }}</h2>

    @include('back.products.form')

    {{ Form::submit('Editar Producto', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}


<br />
<br />
<br />
<br />

<div class="row">

    <h2>Agregar imágenes: </h2>

{{ Form::open(['route' => 'storeProductImages', 'files' => true]) }}

    <div class="form-group">
        <input type="hidden" name="product" value={{ $product->id }}>
        {{ Form::file('images[]', ['class' => 'form-control', 'multiple']) }}
    </div>
    {{ Form::submit('Subir imágenes', ['class' => 'btn btn-success']) }}

{{ Form::close() }}

</div>
<br />
<br />
<br />
<br />
<div class="row">




    <div class="container">

    @if(count($product->images)>0)
        <div class="row">
            <h1>Imágenes del Producto</h1>

            @foreach($product->images as $image)
                <div class="col-lg-3 col-sm-4 col-xs-6">
                    <a title="{{ $product->name }}" href="#">
                        <img class="thumbnail img-responsive miniatura" src="{{ URL::TO('img/products/' . $image->image_name) }}">
                    </a>
                    {{ Form::open(['route' => ['destroyImage', $image->id], 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger btn-mini">Eliminar Imagen</button>
                    {{ Form::close() }}
                </div>
            @endforeach
            <hr>

            <hr>
        </div>
    </div>
    <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h3 class="modal-title">Imagen del producto</h3>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1>No hay imágenes para este producto</h1>
    @endif

    {{--Aca abajo tal lo tenia antes--}}
{{--@forelse($product->images as $image)--}}
            {{--<img class="img-thumbnail img-rounded" width="200px" src="{{ URL::TO('img/products/' . $image->image_name) }}">--}}
            {{--@if(!is_null($image->main))--}}
                {{--Esta es la foto de portada--}}
            {{--@endif--}}

            {{--{{ Form::open(['route' => ['destroyImage', $image->id], 'method' => 'delete']) }}--}}
                {{--<button type="submit" class="btn btn-danger btn-mini">Eliminar Imagen</button>--}}
            {{--{{ Form::close() }}--}}
{{--@empty--}}
    {{--<p>No hay imágenes para este producto</p>--}}
{{--@endforelse--}}

</div>

{{-- Style para el modal de la galeria de imagenes--}}
<style>
    .modal-dialog {width:600px;}
    .thumbnail {margin-bottom:6px;}
    .miniatura {
        width: 300px;
        height: 300px;
    }
</style>

@endsection