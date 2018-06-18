<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css">
  @yield('styles')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://bootswatch.com/4/{{$User->settings->data['theme'] ?? request('theme') ?? 'cosmo'}}/bootstrap.min.css">
  <style>html,body{height: 100%; box-sizing: border-box;}</style>
  @stack('styles')
</head>
<body>
  {{-- <div id="app" style="100%"> --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand"href="{{ url(auth()->check()? '/user': '/') }}">
          <img src="//placehold.it/32X32?LOGO" width="30" height="30" class="d-inline-block align-top" alt="">
          {{ config('app.name', 'Manager Pro') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          {{-- <form class="form-inline mx-auto my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> --}}
          <ul class="navbar-nav ml-auto">
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  {{-- <a class="dropdown-item" href="#">Action</a> --}}
                  @if (Auth::user()->isAdmin)
                    <a class="dropdown-item" href="/admin">
                      Admin
                    </a>
                  @endif
                  <a class="dropdown-item" href="/user/account">
                    Account
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
        {{-- <form class="form-inline mx-auto my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
      {{-- <ul></ul> --}}
    </div>
  </div>
</nav>


<main class="">
  @include('admin.alerts')
  @auth
    <h1 class="text-center py-3">{{ $title ?? 'Welcome' }}</h1>
  @endauth
  @yield('content')
</main>
{{-- </div> --}}
<script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://unpkg.com/bootstrap/dist/js/bootstrap.min.js"></script>
@yield('scripts')
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
@stack('scripts')
</body>
</html>
