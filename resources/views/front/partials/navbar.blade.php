<header>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        {{-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> --}}
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand" href="/"><img class="logo" src="/img/logo.png" alt="logo"></a>
      </div>
      <div class="navbar-collapse collapse" id="navbar" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/faq">Ayuda</a></li>
          @if (!Auth::check())
          <li><a href="/login">Ingresar</a></li>
          <li><a href="/register">Registrarse</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Cuenta <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
          {{-- <span class="caret"></span> --}}
          {{-- <div class="avatar"><img src="images/{{Auth::user()->avatar}}" alt="avatar"/></div> --}}
            <ul class="dropdown-menu dropdown-menu-2">
              <li><a href="/profile">Hola, {{str_limit(Auth::user()->username, 15)}}</a></li>
              @if (Auth::user()->type == 2)
              <li role="separator" class="divider"></li>
              {{-- <li><a href="/profile">Mi cuenta</a></li> --}}
              <li><a href="/orders">Mis pedidos</a></li>
              <li><a href="/admin">Panel admin</a></li>
              @endif
              <li role="separator" class="divider"></li>
              <li><a href="/logout">Salir</a></li>
            </ul>
          </li>
          @endif
          <li class="navbar-cart"><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito<span class="cart-count" id="refresh-after-ajax">{{Cart::count()}}</span></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <form id="navbar-search" class="navbar-form navbar-right" action="/products/search/">
            <div class="form-group">
              <input id="navbar-search-query" type="text" class="form-control" placeholder="Buscar Productos">
            </div>
            <button type="submit" class="btn btn-default btn-esupers">Buscar</button>
          </form>
          {{-- <div style="position: absolute; right: 400px; top: 45px; background-color: rgba(255, 255, 255, 0.4)">
            <ul>
              <li>hola</li>
              <li>hola</li>
              <li>hola</li>
            </ul>
          </div> --}}
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
</header>
