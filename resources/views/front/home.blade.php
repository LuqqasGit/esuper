@extends('front.master')

@section('title')
  Home
@endsection

@section('content')
  <style>
    #map {
      display: none;
      height: 600px;
      width: 95.8%;
      margin: 0 auto;
    }
  </style>
  <div class="main-container-bg">
    <div class="main-container">
      <div class="home-main-container">
        <h1 class="title">Al súper... Desde casa!</h1>
        <form class="location-form" action="/" method="post">
          <div class="labels-div">
          <label>Escribí tu dirección<br>
            <div id="locationField">
              <input id="autocomplete" type="text" name="direccion" placeholder="Ej. Av. Las Heras 1700" onfocus="geolocate()">
            </div>
          </label>
          </div>
          <div class="button">
            <button type="submit" name="submit">Buscar</button>
          </div>
          <div class="button">
            <button id="test"><i class="fa fa-location-arrow" aria-hidden="true"></i> Mi Ubicación</button>
          </div>
        </form>
        <div id="map"></div>
        <section id="market-list" class="super-logo-container">
          <a href="addToCart" data-id="1">
            <article class="super-logo">
              <img src="img/coto.jpg" alt="coto">
            </article>
          </a>
          <a href="addToCart" data-id="2">
            <article class="super-logo">
              <img src="img/disco.jpg" alt="disco">
            </article>
          </a>
          <a href="addToCart" data-id="3">
            <article class="super-logo">
              <img src="img/jumbo.jpg" alt="jumbo">
            </article>
          </a>
          <a href="addToCart" data-id="4">
            <article class="super-logo">
              <img src="img/coto.jpg" alt="coto">
            </article>
          </a>
          <a href="addToCart" data-id="5">
            <article class="super-logo">
              <img src="img/disco.jpg" alt="disco">
            </article>
          </a>
          <a href="addToCart" data-id="6">
            <article class="super-logo">
              <img src="img/jumbo.jpg" alt="jumbo">
            </article>
          </a>
          <a href="addToCart" data-id="7">
            <article class="super-logo">
              <img src="img/coto.jpg" alt="coto">
            </article>
          </a>
          <a href="addToCart" data-id="8">
            <article class="super-logo">
              <img src="img/disco.jpg" alt="disco">
            </article>
          </a>
          <a href="addToCart" data-id="9">
            <article class="super-logo">
              <img src="img/jumbo.jpg" alt="jumbo">
            </article>
          </a>
          <a href="addToCart" data-id="10">
            <article class="super-logo">
              <img src="img/coto.jpg" alt="coto">
            </article>
          </a>
          <a href="addToCart" data-id="11">
            <article class="super-logo">
              <img src="img/disco.jpg" alt="disco">
            </article>
          </a>
          <a href="addToCart" data-id="12">
            <article class="super-logo">
              <img src="img/jumbo.jpg" alt="jumbo">
            </article>
          </a>
        </section>
      </div><!-- .home-main-container -->
    </div><!-- .main-container -->
  </div><!-- .main-container-bg -->
@endsection

@section('scripts')
  <script src="js/google-maps.js"></script>
  {{-- https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyAa13vAwhZI6q0hGqdVnz_kYYV8OHPGi10 --}}
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa13vAwhZI6q0hGqdVnz_kYYV8OHPGi10&libraries=places&callback=initialize" async defer></script>
  <script>
    $('#test').on('click', function (e) {
      e.preventDefault();
      $('#market-list').slideUp('fast');
      $('#map').slideDown('fast');
      setTimeout(function(){
        google.maps.event.trigger(map, 'resize');
        map.setCenter(pos);
      }, 300);
    });
  </script>
@endsection
