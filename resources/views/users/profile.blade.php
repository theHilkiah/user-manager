<form method="post" action="{{url()->current()}}">
    @csrf
    @method('PUT')
    <fieldset>
        {{-- <legend class="d-inline text-center w-50">PROFILE</legend> --}}
        <div class="form-row">
            <div class="col-md-4 text-center">
                <label for="name">Photo</label>
                <img id="photo" src="{{$User->profile->photo ?? '//placehold.it/128X128?Photo'}}" alt="" class="img-thumbnail">
                <br>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="photo" onchange="previewFile(event, '#photo')" value="{{$User->profile->photo??''}}">
                    <label class="custom-file-label" for="photo"></label>
                </div>
            </div>
            <div class="col">
                <label for="name">Bio</label>
                <textarea class="form-control" type="text" name="bio" rows="8">{{ $User->profile->bio ?? old('bio') }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <textarea class="form-control" name="address">{{ $User->profile->address ?? old('address') }}</textarea>
        </div>
        <div class="form-group row">
            <div class="col">
                <label for="name">City</label>
                <input class="form-control" type="text" name="city" value="{{ $User->profile->city ?? old('city') }}">
            </div>
            <div class="col-md-2">
                <label for="name">State</label>
                <input class="form-control" type="text" name="state" value="{{ $User->profile->state ?? old('state') }}">
            </div>
            <div class="col-md-3">
                <label for="name">Zip</label>
                <input class="form-control" type="text" name="zip" value="{{ $User->profile->zip ?? old('zip') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <button class="btn btn-block btn-primary" type="submit">Update</button>
            </div>
                <div class="col">

                </div>
        </div>

    </fieldset>
</form>
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
