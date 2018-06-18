<div class="card">
  <div class="card-body text-center">
    <picture>
      <source srcset="{{$photo = (auth()->user()->profile->photo ?? '//placehold.it/64X64?text=PHOTO')}}" type="image/svg+xml">
      <img src="{{$photo}}" class="img-fluid img-thumbnail" alt="...">
    </picture>
    <div class="text-center">{{auth()->user()->name}}</div>
    <hr>
    <p><a href="/user">Home</a> | <a href="/user/account">Account</a></p>
  </div>
</div>
