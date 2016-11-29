@extends('front.master')

@section('title')
  {{$market->name->name}} ({{$market->address}}) -
@endsection

@section('header-divs')
<div class="main-container-market"><div class="black-overlay-market">
@endsection

@section('content')

  <div class="div-markets-small-container3 modal-{{$market->name->name}}">
  <img src="{{ '/img/markets/' . $market->name_id . '.jpg'}}" alt="{{$market->name_id}}" class="img-markets-small2" />
</div>

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
      <ul>
        @foreach ($products as $product)

          <li class="item-card">
            <h4 style="text-transform:capitalize;">{{$product->name}}</h4>
            <img src="{{ '/img/products/' . $product->id . '.jpg'}}" alt="{{$product->name}}" class="product-list-img" />
            <span style="display:block">${{$product->price}}</span>
          </li>

        @endforeach
      </ul>
@endsection
