@extends('back.master')

@section('title')
    Editar Producto
@endsection

@section('content')

{{ Form::model($product, ['method' => 'PATCH', 'route' => ['product.update', 'id' => $product->id]]) }}

    <h2>Editar producto: {{ $product->name }}</h2>

    <div class="form-group">
        {{ Form::label('name', 'Nombre:')  }}
        {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Precio:') }}
        {{ Form::number('price', null, ['class' => 'form-control', 'step' => 'any']) }}
    </div>

    <div class="form-group">
        {{ Form::label('market_id', 'Market:')  }}
        <select class="form-control" name="market_id" id="market_list">
            <option value=""></option>

            @foreach($markets as $market)
                    <option value="{{$market->id}}"
                    @if($product->market->id == $market->id)
                        selected="selected"
                    @endif
                    >{{$market->name}} ({{$market->address}})</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('brand_id', 'Marca:') }}
        <select name="brand_id" class="form-control" id="brand_list">
            <option value=""></option>

            @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                            @if($product->brand->id == $brand->id)
                                selected="selected"
                            @endif
                    >{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('type_id', 'Tipo de Producto:') }}
        <select name="type_id" class="form-control" id="type_list">
            <option value=""></option>

            @foreach($product_types as $type)
                        <option value="{{ $type->id }}"
                            @if(\App\Product_Types::find($product->type_id)->id == $type->id)
                                selected="selected"
                            @endif
                        >{{ $type->name }}</option>

            @endforeach
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('amount', 'Cantidad:')  }}
        {{ Form::text('amount', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Descripcion:')  }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'size' => '30x5']) }}
    </div>

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