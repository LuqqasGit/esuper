@extends('front.master')

@section('title')
  Home
@endsection

@section('content')
  <div class="main-container-bg">
    <div class="main-container">
      <div class="home-main-container">
        <h1 class="title">Al súper... Desde casa!</h1>
        <form class="location-form" action="" method="post">
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
            <button><i class="fa fa-location-arrow" aria-hidden="true"></i> Mi Ubicación</button>
          </div>
        </form>
        <section class="super-logo-container">
          <a href="">
            <article class="super-logo">
              <img src="img/coto.jpg" alt="coto">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/disco.jpg" alt="disco">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/jumbo.jpg" alt="jumbo">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/coto.jpg" alt="coto">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/disco.jpg" alt="disco">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/jumbo.jpg" alt="jumbo">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/coto.jpg" alt="coto">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/disco.jpg" alt="disco">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/jumbo.jpg" alt="jumbo">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/coto.jpg" alt="coto">
            </article>
          </a>
          <a href="">
            <article class="super-logo">
              <img src="img/disco.jpg" alt="disco">
            </article>
          </a>
          <a href="">
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHuSadsJWqoMilFsznFp2U0TcSKwb_zTc&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
@endsection
