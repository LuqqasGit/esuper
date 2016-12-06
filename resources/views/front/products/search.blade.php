@extends('front.master')

@section('title')
Buscador -
@endsection

@section('header-divs')
<div class="main-container-market"><div class="black-overlay-market">
@endsection

@section('content')

  <h2 class="h2-title-mkt" style="text-transform:capitalize;display: inline-block;">Buscador de productos</h2>

    <div class="line-separator" style="margin-bottom: 0px!important;"></div>

      <div class="instructions">
        <p class="icon-instructions"><i class="fa fa-shopping-basket" aria-hidden="true"></i> 1. elegí tus productos</p>
        <p class="icon-instructions"><i class="fa fa-cart-plus" aria-hidden="true"></i> 2. agregalos al carrito</p>
        <p class="icon-instructions"><i class="fa fa-money" aria-hidden="true"></i> 3. pagá online o en efectivo</p>
        <p class="icon-instructions"><i class="fa fa-motorcycle" aria-hidden="true"></i> 4. recibí tu pedido</p>
      </div>

    </div></div>
    <div class="product-list">
      <h2 class="h2-title-products">Resultados de búsqueda</h2> <br>
      @foreach ($products as $product)
          <li class="item-card">
            <a style="text-decoration:none;" href="/market/{{$product->market->name_id}}/{{$product->market->id}}">
              <img src="{{ '/img/products/' . $product->images->first()->image_name}}" alt="{{$product->name}}" class="product-list-img" />
                <div class="item-text">
                  <span class="products-price">${{$product->price}}</span>
                  <div class="products-name">{{$product->name}}</div>
                  <span class="products-brand">{{$product->brand->name}}</span> <span>({{$product->amount}})</span><br>
                  <span>{{ucwords($product->market->name->name)}}</span>
                  <span>({{ucwords($product->market->address)}})</span>
                </div>
            </a>
          </li>
      @endforeach
    </div>
@endsection

@section('footerColor')
  class="footer-black"
@endsection
