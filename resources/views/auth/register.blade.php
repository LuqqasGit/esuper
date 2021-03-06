@extends('front.master')

@section('title')
  Registrarse -
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
          <h2 class="h2-title-grey">Registrate en eSuper</h2>
          <h2  class="h2-title-grey"><b>Recibí tus compras en menos de 1 hora</b></h2>
        </div>

        <div class="line-separator"></div>

        <div class="signup-box">
          {{-- <div class="social-signup">
            <div class="signup-fb"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></div>
            <div class="signup-ggl"><i class="fa fa-google fa-2x" aria-hidden="true"></i></div>
            <div class="signup-lnk"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></div>
          </div>

          <div class="signup-line"><span>ó</span></div> --}}

          <form class="signup-form" id="signup" method="post" enctype="multipart/form-data" action="{{ url('/register') }}">
            <fieldset>
              {{ csrf_field() }}
              <ul>
                <li>
                  <input class="{{ $errors->has('email') ? ' has-error' : '' }}" required autocomplete="off" type="email" name="email" placeholder="Ingresa tu correo electrónico" value="{{ old('email') }}">
                  <div id="email-validate-div" class="signup-validate-div-hidden">
                    Por favor introduce un correo electrónico válido.
                  </div>
                  @if ($errors->has('email'))
                      <span class="signup-validate-div">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </li>
                <li>
                  <input  class="{{ $errors->has('name') ? ' has-error' : '' }}" required autocomplete="off" type="text" name="name" placeholder="Ingresa tu nombre completo" value="{{ old('name') }}">
                  <div id="name-validate-div" class="signup-validate-div-hidden">
                    Por favor introduce tu nombre.
                  </div>
                  @if ($errors->has('name'))
                      <span class="signup-validate-div">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </li>
                <li>
                  <input  autocomplete="off" type="text" name="username" placeholder="Crea un usuario" value="{{ old('username') }}">
                  <div id="username-validate-div" class="signup-validate-div-hidden">
                    Por favor crea un usuario.
                  </div>
                  @if ($errors->has('username'))
                      <span class="signup-validate-div">
                          <strong>{{ $errors->first('username') }}</strong>
                      </span>
                  @endif
                </li>
                <li>
                  <input id="password" class="{{ $errors->has('password') ? ' has-error' : '' }}"  required type="password" name="password" placeholder="Crea una contraseña">
                  <div id="password-validate-div" class="signup-validate-div-hidden">
                    La contraseña debe tener mínimo 6 caracteres, un número y una letra.
                  </div>
                  @if ($errors->has('password'))
                      <span class="signup-validate-div">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </li>
                <li>
                  <input id="password-confirm"  required type="password" name="password_confirmation" placeholder="Repite la contraseña">
                  <div id="password2-validate-div" class="signup-validate-div-hidden">
                    Las contraseñas no coinciden.
                  </div>
                </li>
              </ul>
            </fieldset>
            <button type="submit" class="signup-submit" name="submit">Continuar</button>
          </form>

          <div class="signup-footer">
              <p>¿Ya estás registrado? <a class="signup-link" href="/login">Ingresa aquí</a> »</p>
          </div>

        </div> <!-- end signup-box -->

      </div> <!-- end signup-main-container -->

@endsection

@section('footerColor')
  class="footer-black"
@endsection
