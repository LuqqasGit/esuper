@php
  $order_total = 0;
  foreach ($order->products as $product) {
    $order_total += $product->price * $product->pivot->product_qty;
  }
  $order_total *= 1.21;
@endphp
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

  <h2 class="h2-title-grey">Entrega de tu pedido</h2>
  <div class="line-separator"></div>

  <div class="container-checkout">

    <div class="list-group cart-list">
      <div class="checkout-address">
        <div class="checkout-header">
          <p class="checkout-title"><i style="color:#34bb9c;" class="fa fa-map-marker" aria-hidden="true"></i> Información de entrega</p>
          <div class="line-separator-malo"></div>
        </div>
        <form class="checkout-form" action="/exito" method="post">
          <label class="checkout-label" for="address">
           Dirección
          </label>
          <input class="form-control input-checkout" type="text" name="address" id="address" value="" placeholder="Sarmiento 3323" required>

          <label class="checkout-label" for="apartment">
            Piso/Departamento
          </label>
          <input class="form-control input-checkout" type="text" name="apartment" id="apartment" value="" placeholder="1D (opcional)">

          <label class="checkout-label" for="cp-barrio">
           Codigo postal/Barrio
          </label>
          <input class="form-control input-checkout" type="text" name="cp-barrio" id="cp-barrio" value="" placeholder="1018 Recoleta">

          <label class="checkout-label" for="cp-barrio">
           Cuidad
          </label>
          <input class="form-control input-checkout" type="text" name="ciudad" id="ciudad" value="CABA" placeholder="CABA" disabled="disabled">
      </div>

      <div class="checkout-payment">
        <div class="checkout-header">
          <p class="checkout-title"><i style="color:#34bb9c;" class="fa fa-credit-card-alt" aria-hidden="true"></i> Información de pago</p>
          <div class="line-separator-malo2"></div>
        </div>

          <label class="checkout-label" for="card-number">
           Numero
          </label>
          <input class="form-control input-checkout" type="number" name="card-number" id="card-number" value="" placeholder="Numero de la tarjeta">

          <label class="checkout-label" for="card-date">
           Fecha de vencimiento
          </label>
          <input class="form-control input-checkout" type="number" name="card-date" id="card-date" value="" placeholder="MM/AA">

          <label class="checkout-label" for="card-cvv">
           Código de seguridad
          </label>
          <input class="form-control input-checkout" type="number" name="card-cvv" id="card-cvv" value="" placeholder="CVV">

          <div class="checkout-button">
            <span class="checkout-total">Total: ${{number_format($order_total, 2)}}</span>
            <a href="/exito"><button id="checkout-cart" type="button" class="btn btn-success">Tarjeta <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button></a>
            <a href="/exito"><button id="checkout-cart" type="button" class="btn btn-success">Efectivo  <i class="fa fa-money" aria-hidden="true"></i></button></a>
          </div>
        </form>
      </div>
      <div style="clear:both"></div>
    </div> {{-- end list-group cart-list --}}
  </div> {{-- end container-checkout --}}

@endsection

@section('footerColor')
  class="footer-black"
@endsection
