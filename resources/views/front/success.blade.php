@extends('front.master')

@section('title')
Pedido completado -
@endsection

@section('navColor')
  class="navbar-black"
@endsection

@section('header-divs')
<div class="main-container-auth"><div>
@endsection

@section('content')


  <h2 style="color:#19bf19;" class="h2-title-grey">Pedido completado</h2>
  <div class="line-separator"></div>

  @php
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $delivery_time = date("H:i", strtotime('+3 hours'));
  @endphp

  <h3 class="h2-title-grey">Felicitaciones, {{Auth::user()->name}}! Tu pedido llegará hoy, antes de las {{$delivery_time}}.</h2>

  <img class="success-img" src="/img/success.png" alt="" />


@endsection

@section('footerColor')
  class="footer-black"
@endsection
