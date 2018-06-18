@php
  $alerts = null;
  if($errors->count()){
    $alerts = true;  $type = 'Error'; $alert = 'danger'; $message = implode("<br/>", $errors->all());
  }
  if(session('success')){
    $alerts = true;  $type = 'Success'; $alert = 'success'; $message = session('success');
  }
  if(session('status')){
    $alerts = true;  $type = 'Status'; $alert = 'warning'; $message = session('status');
  }
  if(session('error')){
    $alerts = true;  $type = 'Error'; $alert = 'danger'; $message = session('error');
  }
@endphp
@isset($alerts)
<div class="alert alert-{{$alert}} alert-dismissible fade show" role="alert">
  <strong>{{$type}}</strong> {!!$message!!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endisset
