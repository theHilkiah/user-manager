@extends('users::layouts.master')

@section('content')
    <div class="">
        <h1 class="h3">Account User Groups </h1>
        <hr>
        
        {{-- <div class="card collapse" id="add-new-group">
            <div class="card-body">
                @include("users::groups.create")
            </div>
        </div> --}}
    </div>
    @include('users::groups.create', $Group ?? [])
@stop
