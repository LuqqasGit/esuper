<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="utf-8">
  <title>@yield('title') - eSuper</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/png" href="favicon.png">
  <script src="js/script.js"></script>
</head>
<body>
  <div class="wrapper">

  @include('front.partials.navbar')

  @yield('content')

  @include('front.partials.footer')

  </div>

  <script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://use.fontawesome.com/2390ddd5c7.js"></script>

  @yield('scripts')
</body>
</html>
