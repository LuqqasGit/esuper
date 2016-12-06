@extends('front.master')



@section('title')
{{ucwords($market->name->name)}} ({{ucwords($market->address)}}) -
@endsection

@section('header-divs')
<div class="main-container-market"><div class="black-overlay-market">
@endsection



@section('content')

  <a href="/market/{{$market->name_id}}">
    <div class="div-markets-small-container3 modal-{{strtolower($market->name->name)}}">
      <img src="{{ '/img/markets/' . $market->name_id . '.jpg'}}" alt="{{$market->name_id}}" class="img-markets-small2" />
    </div>
  </a>

  <h2 class="h2-title-mkt" style="text-transform:capitalize;display: inline-block;">{{$market->name->name}} ({{$market->address}})</h2>
  <h2 class="h2-title" style="display: inline-block;"><i class="fa fa-clock-o" aria-hidden="true"></i> abierto <b>hoy</b> de 8:00 a 19:30</h2>
    <div class="line-separator" style="margin-bottom: 0px!important;"></div>

      <div class="instructions">
        <p class="icon-instructions"><i class="fa fa-shopping-basket" aria-hidden="true"></i> 1. elegí tus productos</p>
        <p class="icon-instructions"><i class="fa fa-cart-plus" aria-hidden="true"></i> 2. agregalos al carrito</p>
        <p class="icon-instructions"><i class="fa fa-money" aria-hidden="true"></i> 3. pagá online o en efectivo</p>
        <p class="icon-instructions"><i class="fa fa-motorcycle" aria-hidden="true"></i> 4. recibí tu pedido</p>
      </div>

    </div></div>
    <div class="product-list">
      <input type="hidden" name="_token" content="{{csrf_token()}}">
      <ul style="padding-left: 0;">

        @foreach ($products_array as $type => $product_collection)
          <h2 class="h2-title-products">{{$type}}</h2>
          @foreach ($product_collection as $product)
            <li class="item-card">
              <img src="{{ '/img/products/' . $product->id . '.jpg'}}" alt="{{$product->name}}" class="product-list-img" />
              <div class="cart-hover">
                @php
                $cart_array = $product->id . '-' . $product->name . '-' . $product->brand->name . '-' . $product->price . '-' . $product->amount;
                @endphp
                <a class="cart-hover-btn" href="addToCart" data-id="{{$product->id}}" data-qty="">
                  <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR
                </a>
              </div>
              <div class="item-text">
                <span class="products-price">${{$product->price}}</span>
                <div class="products-name">{{$product->name}}</div>
                <span class="products-brand">{{$product->brand->name}}</span> <span>({{$product->amount}})</span>
              </div>
            </li>
          @endforeach

        @endforeach
      </ul>
    </div>
@endsection

@section('footerColor')
  class="footer-black"
@endsection
