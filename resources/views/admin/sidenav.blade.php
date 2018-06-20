@php
$activeLink = function($link, $class = 'active'){
  return request()->is("$link*")? " $class": "";
};
@endphp
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>DASHBOARD</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
</h6>
<ul class="nav flex-column mb-2">
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/dashboard')}}" href="/{{ $link }}">
      <span data-feather="home"></span>
      My Dash
      <span class="sr-only">(current)</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/system/updates')}}" href="/{{ $link }}">
      <span data-feather="file-text"></span>
      Updates <span class="badge badge-primary float-right">5</span>
    </a>
  </li>
  @if(($upgrades = request('upgrades')))
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/system/upgrades')}}" href="/{{ $link }}">
      <span data-feather="file-text"></span>
      Upgrades <span class="badge badge-primary float-right">{{$upgrades}}</span>
    </a>
  </li>
  @endif
</ul>
@can('view-modules', Auth::user())
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>CONTENT</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
</h6>
<ul class="nav flex-column mb-2">
  @can('do', Auth::user())
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/pages')}}" href="/{{ $link }}">
      <span data-feather="file-text"></span>
      Pages
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/blocks')}}" href="/{{ $link }}">
      <span data-feather="file-text"></span>
      Blocks
    </a>
  </li>
  @endcan
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/media')}}" href="/{{ $link }}">
      <span data-feather="file-text"></span>
      Files
    </a>
  </li>
</ul>
@endcan
@can('update-models', Auth::user())
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>MODULES</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
</h6>
<ul class="nav flex-column mb-2">
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="file-text"></span>
      Module 1
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="file-text"></span>
      Module 2
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="file-text"></span>
      Module 3
    </a>
  </li>
</ul>
@endcan
@can ('modify-users', auth()->user())
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>Account</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
</h6>
<ul class="nav flex-column mb-2">
  <li class="nav-item">
      <a class="nav-link{{$activeLink($link = 'admin/users')}}" href="/{{ $link }}" href="/{{ $link }}">
        <span data-feather="users"></span>
        Users
      </a>
    </li>

  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/groups')}}" href="/{{ $link }}">
      <span data-feather="file-text"></span>
      Groups
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/access')}}" href="/{{ $link }}">
      <span data-feather="file-text"></span>
      Access
    </a>
  </li>
</ul>

@endcan
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>Settings</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
</h6>
<ul class="nav flex-column mb-2">
  @can ('modify-users', auth()->user())
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Website
      </a>
    </li>
  @endcan

  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="file-text"></span>
      System
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="file-text"></span>
      Security
    </a>
  </li>
</ul>
