@php
  $alerts = null;
  if($errors->count()){
    $alerts = true;  $type = 'Error'; $alert = 'danger'; $message = implode("<br/>", $errors->all()); $icon = 'danger';
  }
  if(session('success')){
    $alerts = true;  $type = 'Success'; $alert = 'success'; $message = session('success'); $icon = 'danger';
  }
  if(session('status')){
    $alerts = true;  $type = 'Status'; $alert = 'warning'; $message = session('status'); $icon = 'danger';
  }
  if(session('error')){
    $alerts = true;  $type = 'Error'; $alert = 'danger'; $message = session('error'); $icon = 'danger';
  }
@endphp
@isset($alerts)
<div class="alert alert-{{$alert}} alert-dismissible fade show text-center" role="alert">
  <span class="float-left"><strong>{{$type}}</strong></span> {!!$message!!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endisset
