@extends('front.master')

@section('title')
Ordenes -
@endsection

@section('header-divs')
<div class="main-container-home"><div class="black-overlay">
@endsection

@section('content')

      <h2 class="h2-title"><b style="text-transform:capitalize;">Ordenes</h2>
        <div class="line-separator"></div>

        <div class="container">
          <ul id="orders-list" class="list-group cart-list">
            @forelse (Auth::user()->orders as $order)
              @php
                $total = 0;
              @endphp
                <li id="order-{{$order->id}}" class="list-group-item">
                  <ul class="list-group cart-list">
                    <li class="list-group-item list-group-item-info">Orden #{{$order->id}}</li>
                    <li class="list-group-item">
                      @foreach ($order->products as $product)
                        <div class="order-item">
                          <img src="{{ '/img/products/' . $product->images->first()->image_name}}" alt="{{$product->name}}">
                          <div class="order-item-text">
                            <div>{{$product->name}}</div>
                            <div>{{$product->brand->name}} ({{$product->amount}})</div>
                            <div>Precio: ${{$product->price}} - Cantidad: {{$product->pivot->product_qty}}</div>
                          </div>
                        </div>
                        @php
                          $total += $product->price * $product->pivot->product_qty;
                        @endphp
                      @endforeach
                      <div style="clear: both;"></div>
                    </li>
                    <li class="list-group-item list-group-item-success">
                      <button data-id="{{$order->id}}" type="button" class="btn btn-danger delete-order">Eliminar orden <i class="fa fa-trash" aria-hidden="true"></i></button>
                      <a href="/checkout"><button type="button" class="btn btn-info">Editar orden <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button></a>
                      <form action="/checkout" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <button type="submit" class="btn btn-success">Pagar ${{$total}} <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button>
                      </form>
                    </li>
                  </ul>
                </li>
            @empty
              <li class="list-group-item">No hay ordenes</li>
            @endforelse
          </ul>
        </div>

        <div class="line-separator"></div>
@endsection
