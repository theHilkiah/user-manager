@extends('layouts.users')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" />
@endsection
@section('content')
  @push('styles')
   <style>  .img-thumb { max-height: 100px; }</style>
  @endpush
<div class="container">
<div class="card-deck-wrapper">
  <div class="card-deck">
    <div class="card col-md-5">
      <div class="card-body">
        <h4 class="card-title">New Files</h4>
        @include('users::users.create.media')
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Uploaded Files</h4>
        <div>
          @verbatim
          <div id="uploads" class="card-columns">
            <div class="card" v-for="media in uploadedFiles">
              <img class="card-img-top img-thumb-64" :src="'/storage/'+media.file" :alt="media.title">
           </div>
         </div>
          @endverbatim
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
  <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@endsection
@push('scripts')
   <script>
    var uploads = new Vue({
      el: '#uploads',
      data: {
        uploadedFiles: @json($User->media)
      }
    });
</script>
@endpush
