@extends('front.master')

@section('title')
Compra -
@endsection

@section('navColor')
  class="navbar-black"
@endsection

@section('header-divs')
<div class="main-container-auth"><div>
@endsection

@section('content')

          <h2 class="h2-title-grey">Productos en el Carrito</h2>
          <div class="line-separator"></div>

          <div class="container-cart">
            <input type="hidden" name="_token" content="{{csrf_token()}}">
            <ul class="list-group cart-list">
              @php
                $cart = Cart::content();
                $cart_total = Cart::total(2,'.');
              @endphp
              @forelse ($cart as $item)
                <li class="list-group-item">
                  <span class="badge">{{$item->qty}}</span>
                  <img style="width: 30px;float:left;margin: -5px 0 0 5px;" src="/img/products/{{$item->id}}.jpg" alt="">
                  {{$item->name}} <b>${{number_format($item->price, 2, '.', '')}}</b>
                </li>
              @empty
                <li class="list-group-item">No tenes productos en tu carrito de compras. Empezá a comprar <a class="cart-no" href="/">acá</a>.</li>
              @endforelse

              @php if (Cart::count() != 0) { @endphp

                <li class="list-group-item">
                  <button id="empty-cart" type="button" class="btn btn-danger">Vaciar carrito <i class="fa fa-trash" aria-hidden="true"></i></button>
                  <button id="checkout-cart" type="button" class="btn btn-success">Pagar ${{$cart_total}}  <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button>
                </li>

              @php } @endphp

            </ul>
          </div>

@endsection

@section('footerColor')
  class="footer-black"
@endsection
