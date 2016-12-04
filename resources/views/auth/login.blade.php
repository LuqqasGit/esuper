@extends('front.master')

@section('title')
  Ingresar -
@endsection

@section('navColor')
  class="navbar-black"
@endsection

@section('header-divs')
<div class="main-container-auth"><div>
@endsection

@section('content')

        <div class="signup-main-container">
          <div class="signup-text-box">
            <h2 class="h2-title-grey"><b>¡Bienvenido de nuevo!</b></h2>
            <h2 class="h2-title-grey">Ingresa con tu usuario y contraseña</h2>
          </div>
          <div class="line-separator"></div>
          <div class="signup-box">

            {{-- <div class="social-signup">
              <div class="signup-fb"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></div>
              <div class="signup-ggl"><i class="fa fa-google fa-2x" aria-hidden="true"></i></div>
              <div class="signup-lnk"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></div>
            </div>

            <div class="signup-line"><span>ó</span></div> --}}

            <form class="signup-form" id="login" action="{{ url('/login') }}" method="post">
              <fieldset>
                {{ csrf_field() }}
                <ul>
                  <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <li>
                      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required >
                      <div id="login-validate-div" class="signup-validate-div-hidden">
                        Por favor introduce tu email.
                      </div>
                      @if ($errors->has('email'))
                          <span class="signup-validate-div">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </li>
                  </div>
                  <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <li>
                      <input type="password" name="password" placeholder="Contraseña" required>

                      @if ($errors->has('password'))
                          <span class="signup-validate-div">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </li>
                  </div>
                </ul>
                <div class="login-menu">
                  <div class="login-remember">
                    <input type="checkbox" name="remember" checked> <p>Recordarme</p>
                  </div>
                  <div class="login-forgot">
                    <p><a class="signup-link" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a></p>
                  </div>
                </div>
              </fieldset>
              <button type="submit" class="signup-submit" name="submit">Continuar</button>
            </form>

            <div class="signup-footer">
                <p>¿No tenés cuenta? <a class="signup-link" href="register">Registrate aquí</a> »</p>
            </div>
          </div> <!-- end signup-box -->
        </div> <!-- end signup-main-container -->
@endsection

@section('footerColor')
  class="footer-black"
@endsection
