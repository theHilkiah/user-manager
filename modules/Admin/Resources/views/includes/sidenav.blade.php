<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">
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

<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>Settings</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
</h6>
<ul class="nav flex-column mb-2">
  @if (auth()->user()->can('update', App\Models\Auth\User::class))
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Account
      </a>
    </li>
  @endif
  
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