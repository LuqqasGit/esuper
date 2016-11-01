@extends('front.master')

@section('title')
  My Account
@endsection

@section('content')
  <div class="main-container-bg-site">
    <div class="main-container">
      <div class="profile-main-container">
        <h1 class="title">Bienvenido {{Auth::user()->name}}</h1>
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
      </div>
    </div>
  </div>
@endsection
