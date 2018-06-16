@extends('layouts.base')
@section('styles')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        font-size: 16px; /* Added*/
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        /*font-size: 84px;*/
        font-size: 5rem;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    /* Added */
    sup{
        font-size: 2rem;
    }
</style>
@endsection
@section('layout')
        <div class="flex-center position-ref full-height">
            
            @include('pages.includes.menu')
            
            <div class="content">
                <div class="title m-b-md">
                    {!! $title ?? (config('app.name').' <sup>'.config('app.version').'</sup>') !!}
                </div>
            </div>
        </div>
@endsection