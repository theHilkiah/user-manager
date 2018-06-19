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
        <div class="card-deck">
            <form class="card shadowed" method="post" action="{{ url()->current() }}">
                <div class="card-header"><span class="card-title">Login Info</span></div>
                <fieldset class="card-body">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="inline-label" for="email">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $User->name ?? old('name') }}">
                    </div>
                    <div class="form-group">
                        <label class="inline-label" for="email">Email Address</label>
                        <input type="text" class="form-control" name="email" value="{{ $User->email ?? old('email') }}">
                    </div>
                    <div class="form-group">
                        <label class="inline-label" for="email">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="{{ $User->phone ?? old('phone') }}">
                    </div>
                </fieldset>
                <hr>
                <fieldset class="card-body collapse" id="password-changer" disabled>
                    <div class="form-group">
                        <label class="inline-label" for="password">Current Password</label>
                        <input type="password" class="form-control" name="old_password" value="************************">
                    </div>
                    <div class="form-group">
                        <label class="inline-label" for="password">New Password</label>
                        <input type="password" class="form-control" name="password" value="">
                        @if($errors->has('oldpass'))
                            <span class="help-block text-danger">{{ $errors->first() }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="inline-label" for="password_confirmation">Retype Password</label>
                        <input type="password" class="form-control" name="password_confirmation" value="">
                    </div>
                </fieldset>
                <fielset class="card-footer">
                    <div class="form-row">
                        <div class="col">
                            <a href="#password-changer" data-toggle="collapse">Change/hide Password</a>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary btn-block" name="type" value="login">Submit</button>
                        </div>
                    </div>
                </fielset>
            </form>
            <form class="card shadowed" method="post" action="{{url()->current()}}" enctype="multipart/form-data">
                <div class="card-header"><span class="card-title">Profile</span></div>
                <fieldset class="card-body">
                    @csrf
                    @method('PUT')
                        {{-- <legend class="d-inline text-center w-50">PROFILE</legend> --}}
                        <div class="form-row">
                            <div class="col-md-4 text-center">
                                <img id="photo" src="{{$User->profile->photo ?? '//placehold.it/128X128?Photo'}}" alt="" class="img-thumbnail">
                                <br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="photo" onchange="previewFile(event, '#photo')" value="{{$User->profile->photo??''}}">
                                    <label class="custom-file-label" for="photo"></label>
                                </div>
                            </div>
                            <div class="col">
                                <label class="inline-label" for="name">Bio</label>
                                <textarea class="form-control" type="text" name="bio" rows="5">{{ $User->profile->bio ?? old('bio') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="inline-label" for="name">Address</label>
                            <textarea class="form-control" name="address">{{ $User->profile->address ?? old('address') }}</textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label class="inline-label" for="name">City</label>
                                <input class="form-control" type="text" name="city" value="{{ $User->profile->city ?? old('city') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="inline-label" for="name">State</label>
                                <input class="form-control" type="text" name="state" value="{{ $User->profile->state ?? old('state') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="inline-label" for="nae">Zip</label>
                                <input class="form-control" type="text" name="zip" value="{{ $User->profile->zip ?? old('zip') }}">
                            </div>
                        </div>

                    </fieldset>
                    <fieldset class="card-footer">
                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-block btn-primary" type="submit" name="type" value="profile">Update</button>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>        
@push('scripts')
<script>
    var previewFile = function(event, _id_) {
        console.log(event, _id_);
       var reader = new FileReader();
       reader.onload = function(){
         var output = document.querySelector(_id_);
         output.src = reader.result;
       };
       reader.readAsDataURL(event.target.files[0]);
     };
</script>
@endpush
    @endsection
