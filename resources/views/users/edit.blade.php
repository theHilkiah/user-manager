@extends('layouts.app')
@section('content')
@push('styles')
<style>
    .shadowed {box-shadow: 1px 1px 1rem 1px }
    label {padding-left: 0.75rem; }
    label + input { margin-top: -2rem; padding-top: 1.25rem !important; height: auto}
    [readonly] {border: none; background:transparent; outline: none}
</style>
@endpush
<div class="container">
    <form method="post" class="card-deck" action="{{ url()->current() }}">
        @csrf
        @method('PUT')
    <fieldset class="card shadowed">
        <legend class="card-title"><span class="btn btn-secondary bordered mx-3">Login Info</span></legend>
        <div class="card-body pb-1">
            <div class="form-group">
                <label for="email">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{ $User->name ?? old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" name="email" value="{{ $User->email ?? old('email') }}">
            </div>
            <div class="form-group">
                <label for="email">Phone Number</label>
                <input type="text" class="form-control" name="phone" value="{{ $User->phone ?? old('phone') }}">
            </div>
        </div>
        <hr>
         <div class="card-body" id="password-changer">
            <div class="form-group">
                <label for="password">Upload Files</label>
                <input type="password" class="form-control" name="old_password" value="">
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" name="password" value="">
                @if($errors->has('oldpass'))
                <span class="help-block text-danger">{{ $errors->first() }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation">Retype Password</label>
                <input type="password" class="form-control" name="password_confirmation" value="">
            </div>
        </div>
        <div class="card-body row">
            <div class="col">
                {{-- <a href="#password-changer" data-toggle="collapse">Change/hide Password</a> --}}
            </div>
            <div class="col">
                <button class="btn btn-block">Submit</button>
            </div>
        </div>
    </fieldset>
    <fieldset class="card shadowed">
        <legend class="card-title"><span class="btn btn-secondary bordered mx-3">Basic Info</span></legend>
        <div class="card-body">
        @include('users.profile')
        </div>

    </fieldset>
</form>
</div>

@endsection
