@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" />
@endsection
@section('content')
<div class="container">
<div class="card-deck-wrapper">
  <div class="card-deck">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">New Files</h4>
        @include('users::users.create.media')
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Uploaded Docs</h4>
        <div id="uploaded-files">
          <ul>
            <li v-for="file in uploadedFiles">
            @{{ file.label }}
           </li>
          </ul>
        </div>
        {{-- @if($User->media->count())
          <ul>
            @foreach ($User->media->sortByDesc('created_at') as $mda)
              <li>
                {{$mda->url}}
              </li>
            @endforeach
          </ul>
        @else
          - You have no files uploaded
        @endif --}}
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@endsection
@push('scripts')
   <script>
  var app2 = new Vue({
    el: '#uploaded-files',
    data: {
      uploadedFiles: @json($User->media->sortByDesc('created_at'))
  });
</script>
@endpush
