<header class="main-header">
  <a href="/"><img src="img/logo.png" alt="logo"></a>
  <div class="toggle-nav-div">
    <button class="toggle-nav" id="toggle-nav-button">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
  </div>
  <div style="clear:both"></div>
  <nav class="main-nav">
    <ul id="nav-div">
      <a href="/"><li>Home</li></a>
      <a href="/faq"><li>Faq</li></a>
      @if (!Auth::check())
        <a href="/login"><li>Log in</li></a>
        <a href="/register"><li>Register</li></a>
      @endif
      @if (Auth::check())
        <a href="/profile"><li>My Account</li></a>
        <a href="/logout"><li>Logout</li></a>
      @endif
    </ul>
  </nav>
</header>
