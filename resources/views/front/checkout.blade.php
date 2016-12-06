@extends('front.master')

@section('title')
Checkout -
@endsection

@section('navColor')
  class="navbar-black"
@endsection

@section('header-divs')
<div class="main-container-auth"><div>
@endsection

@section('content')

  {{-- {{dd(Auth::user()->name)}} --}}

          <h2 class="h2-title-grey">Entrega de tu pedido</h2>
          <div class="line-separator"></div>

          <div class="container-cart">
            <input type="hidden" name="_token" content="{{csrf_token()}}">
            <ul class="list-group cart-list">
              @php
                $cart = Cart::content();
                $cart_total = Cart::total(2,'.');
              @endphp

              <form class="checkout-form" action="index.html" method="post">
                <div style="text-align:left;font-weight:bold;margin-bottom:10px;">
                  <span style="color:#34bb9c;"><i class="fa fa-map-marker" aria-hidden="true"></i></span> Dirección de entrega <br>
                </div>
                <input type="text" name="" value="" placeholder="Direccion">

              </form>

                <li class="list-group-item">
                  <button id="empty-cart" type="button" class="btn btn-danger">Volver atrás</button>
                  <button id="checkout-cart" type="button" class="btn btn-success">Tarjeta ${{$cart_total}}  <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button>
                  <button id="checkout-cart" type="button" class="btn btn-success">Efectivo ${{$cart_total}}  <i class="fa fa-money" aria-hidden="true"></i></button>
                </li>
              </ul>

              <p class="modal-p">
                * Impuesto del 21% aplicado. <img style="margin-top: -4px;" src="/img/ar.gif" alt="AR">
              </p>
          </div>

@endsection

@section('footerColor')
  class="footer-black"
@endsection
