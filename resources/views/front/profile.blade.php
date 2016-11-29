@extends('front.master')

@section('title')
Cuenta -
@endsection

@section('content')
        <h2 class="h2-title">Bienvenido {{Auth::user()->name}}</h2>
        <div class="line-separator"></div>
        <div style="width: 100%; max-width: 400px; margin: auto;">
          <img style="" class="acc-profile-pic" src="images/{{Auth::user()->avatar}}" alt="profile picture">
          <form action="/updateAvatar" method="post" enctype="multipart/form-data">
            <fieldset>
              {{csrf_field()}}
              <label for="avatar">Cambiar Avatar</label>
              <input type="file" name="avatar" id="avatar">
              <input type="submit">
            </fieldset>
          </form>
        </div>
@endsection
