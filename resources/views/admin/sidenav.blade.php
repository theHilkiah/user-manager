<div class="card">
  <div class="card-body text-center">
    <picture>
      <source srcset="{{$photo = (auth()->user()->profile->photo ?? '//placehold.it/64X64?text=PHOTO')}}" type="image/svg+xml">
      <img src="{{$photo}}" class="img-fluid img-thumbnail" alt="...">
    </picture>
    <p><a href="/user">My User Page</a> | <a href="/user/account">My Account</a></p>
  </div>
</div>
@php
$activeLink = function($link, $class = 'active'){
  return request()->is("$link*")? " $class": "";
};
@endphp
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/dashboard')}}" href="/{{ $link }}">
      <span data-feather="home"></span>
      Dashboard
      <span class="sr-only">(current)</span>
    </a>
  </li>
</ul>
@can('view-modules', Modules\Account\Models::class)
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>MODULES</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
</h6>
<ul class="nav flex-column mb-2">
  <li class="nav-item">
    <a class="nav-link{{$activeLink($link = 'admin/media')}}" href="/{{ $link }}">
      <span data-feather="file-text"></span>
      Files
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

<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>Settings</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
</h6>
<ul class="nav flex-column mb-2">
  @can ('update', App\Models\Auth\User::class)
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
