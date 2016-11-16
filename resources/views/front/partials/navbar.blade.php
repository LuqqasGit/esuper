<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img class="logo" src="img/logo.png" alt="logo"></a>
      </div>
      <div class="navbar-collapse collapse" id="navbar" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/">Home</a></li>
          <li><a href="/faq">Faq</a></li>
          @if (!Auth::check())
          <li><a href="/login">Log in</a></li>
          <li><a href="/register">Register</a></li>
          @else
          <li><a href="/cart">Cart <i class="fa fa-shopping-cart" aria-hidden="true"> <span class="cart-count" id="refresh-after-ajax">{{Cart::content()->count()}}</span></i></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              {{str_limit(Auth::user()->name, 15)}}
              <span class="caret"></span>
              <div class="avatar">
                <img src="images/{{Auth::user()->avatar}}" alt="avatar"/>
              </div>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/profile">My account</a></li>
              @if (Auth::user()->type == 2)
              <li role="separator" class="divider"></li>
              <li><a href="/admin/market">Markets</a></li>
              <li><a href="/admin/product">Products</a></li>
              @endif
              <li role="separator" class="divider"></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
</header>
