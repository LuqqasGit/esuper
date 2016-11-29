@extends('front.master')

@section('title')
  Compra - 
@endsection

@section('content')

          <h2 class="h2-title">Shopping Cart</h2>
          <div class="line-separator"></div>

          <div class="container">
            <ul class="list-group cart-list">
              @php
                $cart = Cart::content();
              @endphp
              @forelse ($cart as $item)
                <li class="list-group-item">
                  <span class="badge">{{$item->qty}}</span>
                  {{$item->name}} | Precio: {{$item->price}}
                </li>
              @empty
                <li class="list-group-item">No hay productos en el Cart</li>
              @endforelse
              <li class="list-group-item">
                <button id="empty-cart" type="button" class="btn btn-danger">Empty Cart <i class="fa fa-trash" aria-hidden="true"></i></button>
                <button id="checkout-cart" type="button" class="btn btn-success">Checkout <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button>
              </li>
            </ul>
          </div>

@endsection

@section('scripts')
  <script>
    /* EMPTY CART */
    $('#empty-cart').on('click', function () {
      loading.slideDown('slow');
      $.ajax({
        url: 'cart',
        type: 'delete',
        success: function (msg) {
          $("#refresh-after-ajax").text(msg);
          $(".list-group").html('<li class="list-group-item">No hay productos en el Cart</li>');
          loading.slideUp('fast');
        }
      });
    });
  </script>
@endsection
