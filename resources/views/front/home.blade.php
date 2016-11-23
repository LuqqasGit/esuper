@extends('front.master')

<title>eSuper</title>


@section('content')
  <style>
    #map {
      display: none;
      height: 600px;
      width: 95.8%;
      margin: 0 auto;
    }


  </style>

  <div id="market-list" class="market-list" >
    <h2>Elegí un supermercado para <b>Capital Federal</b></h2>
    <p class="locations-cont"><i class="fa fa-map-marker" aria-hidden="true"></i>  Pronto más ubicaciones</p>
    <div class="market-separator"></div>

    <div class="market-list-group">
    @foreach ($markets as $market)
      @if (is_object($market))
      <a href="{{ url('/market/' . $market->id) }}" class="market-list-over">
  		<div class="market-list-over-div">
        <div class="div-markets-small-container2 modal-{{$market->name}}">
  			<img src="{{ '/img/markets/' . $market->id . '.jpg'}}" alt="{{$market->name}}" class="market-list-over-img" />
  		</div></div>
  		<div class="market-list-over-div2">
  			<h3 class="market-list-over-h3">
          {{$market->name}}
  			</h3>
  			<p class="market-list-over-p">
          Address {{$market->address}}
  			</p>
  		</div>
      </a>
      @endif
    @endforeach
    </div>
  </div>

  <div id="main-container-bg" class="main-container-bg">
    <div class="main-container">
      <div class="home-main-container">
        <h1 class="title"> </h1>

        <!-- Modal -->
        <div id="esuper-intro" class="modal fade modal-index" role="dialog">
          <div class="modal-dialog modal-dialog-index">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header modal-header-index">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img src="/img/logo_black.png" class="footer-logo" alt="esuper" style="margin: auto;" />
                <h3 class="modal-title">Recibí tus compras en menos de 1 hora</h3>
              </div>
              <div class="modal-body">
                <div class="modal-message">
                  <img src="/img/quote.png" alt="esuper" style="width: 50px;opacity: 0.4;" />
                    <h4 class="modal-title modal-title-2">eSuper es tu manera de ir al supermercado, online. Envío <span class="text-free">GRATIS</span> en tu primera orden. <b>Entrá, elegí, pedí, disfrutá.</b><br><br> Para empezar, elegí un supermercado, o buscá tu dirección en el <a href="#" id="test" data-dismiss="modal">mapa</a>.</h4>

                    <div style="text-align: center;">
                    	<div class="div-markets-small modal-coto">
                        <a href="/market/1"><img src="/img/markets/1.jpg" class="img-markets-small" alt='Coto' /></a>
                    	</div>

                      <div class="div-markets-small modal-jumbo">
                    		<a href="/market/2"><img src="/img/markets/2.jpg" class="img-markets-small" alt='Jumbo' /></a>
                    	</div>

                      <div class="div-markets-small modal-disco">
                    		<a href="/market/3"><img src="/img/markets/3.jpg" class="img-markets-small" alt='Disco' /></a>
                    	</div>
                    </div>
                    <p class="modal-p">
                      No volver a mostrar este mensaje
                    </p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->





        <div id="google-map-home">
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
      </div><!-- .google-map-home -->

      </div><!-- .home-main-container -->
    </div><!-- .main-container -->
  </div><!-- .main-container-bg -->
@endsection

@section('scripts')
  <script src="js/google-maps.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa13vAwhZI6q0hGqdVnz_kYYV8OHPGi10&libraries=places&callback=initAutocomplete" async defer></script>
  <script>
    $('#test').on('click', function (e) {
      e.preventDefault();
      initMap();
      // $('#market-list').slideUp('fast');
      $('#map').slideDown('fast');
      setTimeout(function(){
        google.maps.event.trigger(map, 'resize');
      }, 300);
    });

    $('#supermarkets-home').on('click', function (e) {
      e.preventDefault();
      $('#main-container-bg').slideToggle(1);
      $('#market-list').slideToggle(1);
    });
  </script>
@endsection
