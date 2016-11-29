@extends('front.master')

@section('title')
  {{$market->name->name}} ({{$market->address}}) -
@endsection

@section('header-divs')
<div style="    height: 100%;
    background: url(/img/bg.jpg);
    text-align: center;background-size: cover;">
    <div style="background: -webkit-linear-gradient(top, rgba(0,0,0,0) -90%,rgba(0,0,0,0.6) 100%);height:100%;    padding-top: 5px;">


@endsection

@section('content')

  <style media="screen">

  .item-card {
      display: inline-block;
      position: relative;
      width: 206px;
      height: 336px;
      vertical-align: top;
      background: #fff;
      border: 1px solid #e5edec;
      text-align: left;
      color: #5a5a5a;
      font-weight: 400;
      margin: 0 -1px -1px 0;
      cursor: pointer;
      white-space: initial;
  }

  </style>

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
            {{$product->name}}
          </li>

        @endforeach
      </ul>
@endsection
