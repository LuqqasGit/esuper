@extends('front.master')

@section('title')
  Market simple
@endsection

@section('content')
  <div class="main-container-bg">
    <div class="main-container">
      <div class="home-main-container">
        <h1 class="title">Al súper... Desde casa!</h1>
        <section class="super-logo-container">
          <a href="{{ url('/market/' . $market->id) }}">
            <article class="super-logo">
              <img src="{{ '/img/markets/' . $market->name_id . '.jpg'}}" alt="{{$market->name}}" />
              <p>
                {{ $market->address }}
              </p>
            </article>
          </a>
        </section>
      </div><!-- .home-main-container -->
    </div><!-- .main-container -->
    <div class="clear"></div>
  </div><!-- .main-container-bg -->
@endsection

@section('scripts')
  <script src="js/google-maps.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHuSadsJWqoMilFsznFp2U0TcSKwb_zTc&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
@endsection
