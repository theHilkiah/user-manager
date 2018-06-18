@extends('users::layouts.master')
{{-- 
@push('styles')
<style>
    .dropzone .done-upload{
        display:none;
    }
    .dropzone.dz-clickable.dz-started .done-upload{
        display: inline-block;
    }
</style>
@endpush --}}
@section('content')
    <div class="container">
        <h1 class="h4 mt-3">Account For {{ $User->name }}</h1>
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    @include('users.create', $User)
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @include('users.profile', $User)
                </div>
            </div>
        </div>
        <hr>
        <div class="cards">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="true">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">Files</a>
                </li>
                {{--  <li class="nav-item">
                    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                </li>  --}}
            </ul>

            <div class="tab-content card border-top-0">
                <div class="tab-pane active" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                 <p for="">Add Notes</p>
                                @include('users::users.create.notes')
                            </div>
                            <div class="col">
                               <p>CURRENT NOTES</p>
                               @if($Notes->count())
                               <ul>
                                   @foreach ($Notes->sortByDesc('created_at') as $note)
                                   <li>
                                       <strong>{{ $note->title }}</strong><br>
                                       {{ $note->content }}<br>
                                       <small>- {{ $note->signature }}</small>
                                   </li>
                                   @endforeach
                               </ul>
                               @else
                                   - There are no notes on {{$User->name}} currently
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane card border-top-0" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="mt-3">
                                    Upload files for {{$User->fname}}
                                </p>
                                @include('users::users.create.notes')
                            </div>
                            <div class="col">
                                <p>UPLOADED FILES</p>
                                @if($User->media->count())
                                <ul>
                                    @foreach ($User->media->sortByDesc('created_at') as $mda)
                                    <li>
                                       {{$mda->url}}
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                    - There are no files uploaded for {{$User->name}} currently
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                {{--  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
                <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>  --}}
            </div>
        </div>
    </div>
@endsection
