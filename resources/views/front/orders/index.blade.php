@extends('front.master')

@section('title')
Orders -
@endsection

@section('header-divs')
<div class="main-container-home"><div class="black-overlay">
@endsection

@section('content')

      <h2 class="h2-title"><b style="text-transform:capitalize;">Orders</h2>
        <div class="line-separator"></div>

        <ul class="list-group cart-list">
          @forelse ($orders as $order)
            <li class="list-group-item">{{$order}}</li>
          @empty
            <li class="list-group-item">No hay ordenes de compra</li>
          @endforelse
        </ul>

        <div class="line-separator"></div>
@endsection
