@extends('front.master')

@section('title')
  Market
@endsection

@section('content')
  <div class="main-container-bg">
    <div class="main-container">
      <div class="home-main-container">
        <h1 class="title">Al súper... Desde casa!</h1>

        <section class="super-logo-container">
          @foreach ($markets as $market)
            @if (is_object($market))

              <a href="{{'/market/' . $market->name_id . '/' . $market->id}}">
                <article class="super-logo">
                  <img src="{{ '/img/markets/' . $market->name_id . '.jpg'}}" alt="{{$market->name}}" />
                </article>
              </a>

            @endif
          @endforeach
        </section>
      </div><!-- .home-main-container -->
    </div><!-- .main-container -->
    <div class="clear"></div>
  </div><!-- .main-container-bg -->
@endsection
