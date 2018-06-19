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

    <div class=" mt-3">
      <div class="card-header">
        <a class="btn btn-sm btn-primary float-right" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Edit Account Info
        </a>
        <h1 class="h4">{{ $User->name }}</h1>
      </div>
      <div class="card card-body collapse border-top-0" id="collapseExample">
        @if ($User->active)
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
        @else
          <p class="my-3 text-center">This user has not yet activated this account! Updates are not yet available</p>
        @endif
      </div>
    </div>

    <hr>
    <div class="cards">
      @php
        $request = request('active') ?? 'notes';
        $active = function($tab, $extra = '')use($request){
          $active = $request == $tab? ' active': '';
          return $active .= $active != ''? ' '.$extra: '';
        };

      @endphp
      <ul class="nav nav-tabs bg-dark pt-3" id="myTab" role="tablist">
        <li class="nav-item">
          <h5 class="mx-3 text-white">Additional Info</h5>
        </li>
        <li class="nav-item ml-auto">
          <a class="nav-link{{$active('notes')}}" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes">Notes</a>
        </li>
        <li class="nav-item{{$active('media')}}">
          <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media">Files</a>
        </li>
        <li class="nav-item"> </li>
        {{--  <li class="nav-item">
        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
    </li>  --}}
  </ul>

  <div class="tab-content card border-top-0">
    <div class="tab-pane{{$active('notes', 'show')}}" id="notes" role="tabpanel" aria-labelledby="notes-tab">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <p for="">ADD NEW NOTES</p>
            @include('users::users.create.notes')
          </div>
          <div class="col">
            <p>CURRENT NOTES</p>
            @if($Notes->count())
              {{--  <ul>  --}}
                @foreach ($Notes->sortByDesc('created_at') as $note)
                <blockquote class="blockquote">
                  <strong>{{ $note->title }}</strong> - <small>{{$note->type}}</small>
                  <p class="mb-0 truncate w-sm" data-toggle="tooltip" data-trigger="hover" data-title="{!! $note->content !!}">{!! $note->content !!}</p>
                  <footer class="blockquote-footer"><cite title="Source Title">{{ $note->signature }}</cite></footer>
                </blockquote>

                {{--  <li>
                    <strong>{{ $note->title }}</strong><br>
                    {{ $note->content }}<br>
                    <small>- {{ $note->signature }}</small>
                  </li>  --}}
                @endforeach
              {{--  </ul>  --}}
            @else
              - There are no notes on {{$User->name}} currently
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane{{$active('media', 'show')}} card border-top-0" id="media" role="tabpanel" aria-labelledby="media-tab">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <p class="mt-3">
              Upload files for {{$User->fname}}
            </p>
            @include('users::users.create.media')
          </div>
          <div class="col">
            <p>UPLOADED FILES</p>
            @if($User->media->count())
              <table class="table">
                @foreach ($User->media->sortByDesc('created_at') as $mda)
                  <tr class="border-bottom">
                    <td><img class="img-thumb-64" {!!$mda->preview!!}></td>
                    <td>{{$mda->file}}<br/>{{$mda->title}}</td>
                  </tr>
                @endforeach
              </table>
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
