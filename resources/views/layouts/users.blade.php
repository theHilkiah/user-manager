@extends(auth()->user()->isAdmin? 'layouts.admin' :'layouts.app')
@section(auth()->user()->isAdmin? 'layout': 'content')
    @yield('content')
@endsection