 @if (Route::has('login'))
    <div class="top-right links">        
        @auth
            <a href="{{ url('/admin') }}">Admin</a>
        @else
            <a href="{{ url('/auth') }}">Access</a>
            {{-- <a href="#" role="button" id="mainMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Access
            </a>
            <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="mainMenuLink">
                <a class="dropdown-item text-muted" href="{{ route('login') }}">Login</a>
                <a class="dropdown-item text-muted" href="{{ route('register') }}">Register</a>
            </div>             --}}
        @endauth
    </div>
@endif