@extends('users::layouts.master')

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
                            <form action="/admin/users/{{ $User->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="notes title">
                                <textarea name="content" class="form-control"></textarea>
                                <button class="btn btn-block" name="notes" value="yes">Submit</button>
                            </form>
                        </div>                            <ul class="col">
                            @foreach ($Notes as $note)
                            <li>
                                <strong>{{ $note->title }}</strong><br>
                                {{ $note->content }}<br>
                                <small>- {{ $note->signature }}</small>
                            </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <div class="row">
                        <div class="col">
                            <form action="/admin/users/{{ $User->id }}" class="dropzone">
                                @method('PUT')
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                        </div>
                        <div class="col"></div>
                    </div>

                </div>
                {{--  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
                <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>  --}}
            </div>
        </div>

        <script>
        $(function () {
            $('#myTab li:last-child a').tab('show')
        })
        </script>
    </div>
@stop
