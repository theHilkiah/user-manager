@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/css/dataTables.bootstrap4.min.css" />
@endsection
@section('layout')
    @yield('content')
@endsection
@section('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/js/jquery.dataTables.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@endsection