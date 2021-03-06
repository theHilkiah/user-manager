@extends('layouts.users')
@section('content')
@push('styles')
<style>
    .shadowed {box-shadow: 1px 1px 1rem 1px }
    .inline-label {padding-left: 0.75rem; }
    .inline-label + .form-control { margin-top: -2rem!important; padding-top: 1.25rem !important; height: auto}
    [readonly] {border: none; background:transparent; outline: none}
</style>
@endpush
<div class="container">
    <div class="card-columns">
     <div class="card  border-primary text-primary">
         <div class="card-header">Account</div>
         <div class="card-body">
           @php $popover = ''; @endphp
            <a href="" data-toggle="popover" data-html="true" data-content="{!!$popover!!}">
              {!! ($User->verified? '<span class="text-success">V': '<span class="text-danger">Un').'verified</span>'!!}
            </a>
            |
            <a href="">
              {!! ($User->active? '<span class="text-success">A': '<span class="text-danger">Ina').'ctivated</span>'!!}
            </a>
         </div>
         <div class="card-footer text-right">
             <a class="btn btn-sm btn-outline-info" href="/user/account">edit</a>
         </div>
     </div>
     <div class="card  border-primary text-primary">
         <div class="card-header">Documents</div>
         <div class="card-body">{{$User->media->count() ?? 0}} files</div>
         <div class="card-footer text-right">
             <a class="btn btn-sm btn-outline-info" href="/user/uploads">enter</a>
         </div>
     </div>
     @if ($User->isMember)
         <div class="card  border-primary text-primary">
         <div class="card-header">Widget #2</div>
         <div class="card-body"> ... </div>
         <div class="card-footer"></div>
     </div>
     <div class="card  border-primary text-primary">
         <div class="card-header">Widget #4</div>
         <div class="card-body"> ... </div>
         <div class="card-footer"></div>
     </div>
     @endif
     <div class="card  border-primary text-primary">
         <div class="card-header">Messages</div>
         <div class="card-body">
             @php $Notes = $User->notes()->where('type', 2)->get(); @endphp
             @if ($Notes && ($count = $Notes->count()))
             <a href="#messagesBox" data-toggle="modal">
                 {{ $count }}
             </a>
             <div class="modal fade" id="messagesBox" tabindex="-1" role="dialog" aria-labelledby="messagesBoxLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messagesBoxLabel">Messages & Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($Notes as $note)
                        <blockquote class="blockquote">
                            <strong>{{ $note->title }}</strong>
                            <p class="mb-0 truncate w-sm" data-toggle="tooltip" data-trigger="hover" data-title="{!! $note->content !!}">{!! $note->content !!}</p>
                            <footer class="blockquote-footer"><cite title="Source Title">{{ $note->signature }}</cite></footer>
                        </blockquote>
                    @endforeach
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
            @else
              No messages
             @endif
        </div>

         <div class="card-footer"></div>
     </div>
     <form class="card  border-primary text-primary" action="{{url()->current()}}" method="get">
         <div class="card-header">Settings</div>
         <div class="card-body">
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Theme </span>
              </div>
              <select class="form-control" name="theme">
                @php
                  $current = ($User->settings->data['key'] ?? request('theme') ?? old('data.key')) ?? '';
                @endphp
                <option value=""></option>
                @foreach (['cosmo', 'cyborg', 'flat', 'celurean'] as $k => $theme)
                  <option value="{{$theme}}"{{$current == $theme? ' selected': ''}}>Theme {{$k + 1}}</option>
                @endforeach
              </select>
            </div>
         </div>
         <div class="card-footer">
           <button class="btn btn-sm btn-primary">Update</button>
         </div>
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
@section('scripts')
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
@endsection
