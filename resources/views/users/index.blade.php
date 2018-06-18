@extends('layouts.app')
@section('content')
@push('styles')
<style>
    .shadowed {box-shadow: 1px 1px 1rem 1px }
    label {padding-left: 0.75rem; }
    label + input { margin-top: -2rem; padding-top: 1.25rem !important; height: auto}
    [readonly] {border: none; background:transparent; outline: none}
</style>
@endpush
<div class="container">
    <div class="card-columns">
     <div class="card">
         <div class="card-header">Account</div>
         <div class="card-body"></div>
         <div class="card-footer text-right">
             <a class="btn btn-sm btn-outline-info" href="/user/account">edit</a>
         </div>
     </div>
     <div class="card">
         <div class="card-header">Documents</div>
         <div class="card-body"></div>
         <div class="card-footer text-right">
             <a class="btn btn-sm btn-outline-info" href="/user/uploads">enter</a>
         </div>
     </div>
     <div class="card">
         <div class="card-header">Widget #2</div>
         <div class="card-body"></div>
         <div class="card-footer"></div>
     </div>
     <div class="card">
         <div class="card-header">Widget #4</div>
         <div class="card-body"></div>
         <div class="card-footer"></div>
     </div>
     <div class="card">
         <div class="card-header">Widget #5</div>
         <div class="card-body"></div>
         <div class="card-footer"></div>
     </div>
     <div class="card">
         <div class="card-header">Widget #6</div>
         <div class="card-body"></div>
         <div class="card-footer"></div>
     </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
@endsection
