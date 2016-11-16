<header>
  {{-- <a href="/"><img class="logo" src="img/logo.png" alt="logo"></a>
  <div class="toggle-nav-div">
    <button class="toggle-nav" id="toggle-nav-button">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
  </div>
  <div style="clear:both"></div>
  <nav class="main-nav">
    <ul id="nav-div">
      <li><a href="/">Home</a></li>
      <li><a href="/faq">Faq</a></li>
      @if (!Auth::check())
        <li><a href="/login">Log in</a></li>
        <li><a href="/register">Register</a></li>
      @endif
      @if (Auth::check())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="avatar">
              <img src="images/{{Auth::user()->avatar}}" alt="avatar"/>
            </div>
            {{str_limit(Auth::user()->name, 21)}} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="/profile">My Account</a></li>
            <li><a href="/logout">Logout</a></li>
          </ul>
        </li>
      @endif
    </ul>
  </nav>
  <div style="clear:both"></div> --}}

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
        <a class="navbar-brand" href="/"><img class="logo" src="/img/logo.png" alt="logo"></a>
      </div>
      <div class="navbar-collapse collapse" id="navbar" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/">Home</a></li>
          <li><a href="/faq">Faq</a></li>
          @if (!Auth::check())
          <li><a href="/login">Log in</a></li>
          <li><a href="/register">Register</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              {{str_limit(Auth::user()->name, 21)}}
              <span class="caret"></span>
              <div class="avatar">
                <img src="images/{{Auth::user()->avatar}}" alt="avatar"/>
              </div>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/profile">My account</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
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
