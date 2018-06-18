<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="ico/favicon.ico">
    <title>@yield('title', $title ?? config('app.name'))</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/{{$User->settings->theme ?? 'cosmos'}}/bootstrap.min.css">
    @yield('styles')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @stack('styles')
  </head>

  <body>

    <header>
      @include('admin.header')
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            @include('admin.sidenav')
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
           @include('admin.alerts')
          @yield('layout')
        </main>
      </div>
    </div>

    <footer>
      @include('admin.footer')
    </footer>

    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    @yield('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
  </body>
</html>
