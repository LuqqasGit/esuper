@extends('front.master')

@section('title')
Home -
@endsection

@section('header-divs')
<div class="main-container-home"><div class="black-overlay">
@endsection

@section('content')

        <!-- Modal -->
        <div id="esuper-intro" class="modal fade modal-index" role="dialog">
          <div class="modal-dialog modal-dialog-index">
            <div class="modal-content">
              <div class="modal-header modal-header-index">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img src="/img/logo_black.png" class="footer-logo" alt="esuper" style="margin: auto;" />
                <h3 class="modal-title">Recibí tus compras en menos de 1 hora</h3>
              </div>
              <div class="modal-body">
                <div class="modal-message">
                  <img src="/img/quote.png" alt="esuper" style="width: 50px;opacity: 0.4;" />
                    <h4 class="modal-title modal-title-2">eSuper es tu manera de ir al supermercado, online. Envío <span class="text-free">GRATIS</span> en tu primera compra. <b>Entrá, elegí, pedí, disfrutá.</b><br><br> Para empezar, elegí un supermercado, o buscá una sucursal en el <a href="#" data-dismiss="modal">mapa</a>.</h4>

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

          <h2 class="h2-title">Elegí un supermercado para <b>Capital Federal</b></h2>
          <div class="line-separator"></div>
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
            			<p class="market-list-over-p"><i class="fa fa-location-arrow" aria-hidden="true"></i> hay <b>{{$marketcount[$market->id]}}</b> cerca tuyo</p>
                  <p class="market-list-over-p"><i class="fa fa-motorcycle" aria-hidden="true"></i> entrega inmediata</p>
                  <p class="market-list-over-p"><i class="fa fa-credit-card" aria-hidden="true"></i> <b>6</b> cuotas sin interés</p>
          		</div>
              </a>
              @endif
            @endforeach
          </div>
          <div class="line-separator"></div>

          <p class="locations-cont"><i class="fa fa-map-marker" aria-hidden="true"></i>  Supermercados en tu área. Pronto más ubicaciones</p>

          <div class="main-map">
            <div id="map"></div>
          </div>



@endsection

@section('scripts')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa13vAwhZI6q0hGqdVnz_kYYV8OHPGi10&libraries=places" async defer></script>
  <script src="/js/google-maps.js"></script>
@endsection
