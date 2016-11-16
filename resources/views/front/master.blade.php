<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="utf-8">
  <title>@yield('title') - eSuper</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <div class="wrapper">

  @include('front.partials.navbar')

  @yield('content')

  @include('front.partials.footer')

    <div id="loading-div" class="loader-overlay">
      <div class="loader-container">
        <span>Un momento... <div class="loader"></div></span>
      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/2390ddd5c7.js"></script>
  <script>
    var loading = $('#loading-div');

    /* AJAX HEADERS SETUP */
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': "{{csrf_token()}}" }
    });

    /* ADD ITEM TO CART */
    $('a[href="addToCart"]').on('click', function (e) {
      e.preventDefault();
      loading.slideDown('slow');
      $.ajax({
        url: '/add-to-cart/' + $(this).data('id'),
        type: 'patch',
        success: function (msg) {
          $("#refresh-after-ajax").text(msg);
          loading.slideUp('fast');
        },
        error: function () {
          loading.slideUp('fast');
        }
      });
    });
  </script>
  @yield('scripts')
  <script src="js/script.js"></script>
</body>
</html>
