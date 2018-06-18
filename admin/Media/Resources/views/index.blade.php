@extends('media::layouts.master')

@section('content')
    <div class="table-responsive">
        <table class="table data-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thumb</th>
                    <th scope="col">Path</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Uploader</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Media as $mda)
                    <tr>
                        <td>{{$mda->id}}</td>
                        <td>
                           <img class="img-thumb" src="{{asset('storage/'.$mda->file)}}" alt="">
                        </td>
                        <td>{{$mda->file}}</td>
                        <td>{{$mda->user->name}}</td>
                        <td>{{$mda->user->uploader->name}}</td>
                        <td>{{$mda->type}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.data-table').DataTable();
    });
</script>
@endpush
