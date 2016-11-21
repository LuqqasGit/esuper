<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="utf-8">
  <meta id="auth" data-auth="{{Auth::check()}}">
  <title>@yield('title') - eSuper</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <div class="wrapper">

    <div id="first-time-welcome">
      <img src="img/ftwbg.jpg" alt="guy ordering from esuper">
      <div id="close-modal"><i class="fa fa-times" aria-hidden="true"></i></div>
      <h1>Bienvenido a eSUPER</h1>
      <h2>Hacé las compras, desde la comodidad de tu casa!</h2>
      <ol>
        <li>Elegí tu cadena favorita</li>
        <li>Buscá los productos que quieras</li>
        <li>Agregalos al carrito</li>
        <li>Comprá desde la comodidad de tu casa y esperá el pedido!</li>
      </ol>
    </div>

  @include('front.partials.navbar')

  @yield('content')

  @include('front.partials.footer')

    <div id="loading-div" class="loader-overlay">
      <div class="loader-container">
        <span>Un momento... <div class="loader"></div></span>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/2390ddd5c7.js"></script>
  @yield('scripts')
  <script src="js/script.js"></script>
  <script type="text/javascript">
$(window).load(function(){
  $('#myModal').modal('show');
});
</script>
</body>
</html>
