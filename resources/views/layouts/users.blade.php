@extends(auth()->user()->isVendor? 'layouts.app' :'layouts.admin')
@section(auth()->user()->isVendor? 'content': 'layout')
    @yield('content')
@endsection