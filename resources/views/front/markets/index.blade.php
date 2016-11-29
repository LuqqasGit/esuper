@extends('front.master')

@section('title')
  {{$marketname[0]->name}} -
@endsection

@section('header-divs')
<div class="main-container-home"><div class="black-overlay">
@endsection

@section('content')
<style>
  #map {
    height: 600px;
    width: 95.8%;
    margin: 0 auto;
  }
</style>

      <h2 class="h2-title"><b style="text-transform:capitalize;">{{$marketname[0]->name}}</b> en Capital Federal</h2>
        <div class="line-separator"></div>

        <div class="market-list-group">
          @foreach ($markets as $market)
            @if (is_object($market))
            <a href="{{'/market/' . $market->name_id . '/' . $market->id}}" class="market-list-over">
            <div class="market-list-over-div">
              <div class="div-markets-small-container2 modal-{{$marketname[0]->name}}">
              <img src="{{ '/img/markets/' . $market->name_id . '.jpg'}}" alt="{{$market->name_id}}" class="market-list-over-img" />
            </div></div>
            <div class="market-list-over-div2">
              <h3 class="market-list-over-h3" style="text-transform:capitalize;">
                {{$marketname[0]->name}} | {{$market->address}}
              </h3>
                <p class="market-list-over-p"><i class="fa fa-clock-o" aria-hidden="true"></i> abierto <b>hoy</b> de 8:00 a 19:30</p>
                <p class="market-list-over-p"><i class="fa fa-motorcycle" aria-hidden="true"></i> entrega inmediata</p>
                <p class="market-list-over-p"><i class="fa fa-credit-card" aria-hidden="true"></i> <b>6</b> cuotas sin interés</p>
            </div>
            </a>
            @endif
          @endforeach
        </div>

        <div class="line-separator"></div>

        <p class="locations-cont"><i class="fa fa-map-marker" aria-hidden="true"></i>  Elegí tu sucursal de {{$marketname[0]->name}} más cercana</p>

        <div class="main-map">
          <div id="map"></div>
        </div>
@endsection

@section('scripts')
  <script src="/js/google-maps.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa13vAwhZI6q0hGqdVnz_kYYV8OHPGi10&libraries=places&callback=initialize" async defer></script>
@endsection
