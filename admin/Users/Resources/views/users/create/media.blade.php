@push('styles')
<style>
    .dropzone .done-upload{
        display:none;
    }
    .dropzone.dz-clickable.dz-started .done-upload{
        display: inline-block;
    }
</style>
@endpush
<form action="{{$media_url ?? '/admin/media'}}" class="dropzone" method="post">
       <a href="{{url()->current()}}?active=media" class="float-right done-upload">Done Upload</a>
       @csrf
       @isset($user_side) @method('PUT') @endisset
       <input type="hidden" name="user_id" value="{{ $User->id }}">
       <div class="fallback">
           <input name="file" class="form-control" type="file" multiple />
       </div>
</form>
