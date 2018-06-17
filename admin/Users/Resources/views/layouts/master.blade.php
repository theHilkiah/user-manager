@extends('layouts.admin')
@section('styles')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/css/dataTables.bootstrap4.min.css" /> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
@endsection
@section('layout')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">...</li>
        </ol>
    </nav>
    @yield('content')
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/js/jquery.dataTables.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/js/dataTables.bootstrap4.min.js"></script>   
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.data-table').DataTable();
        $('.select2').select2();
    });
</script>
 @endsection