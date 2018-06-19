@extends('media::layouts.master')

@section('content')
    <div class="table-responsive">
        <table class="table data-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Preview</th>
                    <th scope="col">File Path</th>
                    <th scope="col">File Owner</th>
                    <th scope="col">Uploader</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Media as $mda)
                    <tr>
                        <td>{{$mda->id}}</td>
                        <td><img class="img-thumb" {!!$mda->preview!!}></td>
                        <td>{{$mda->file}}</td>
                        <td>{{$mda->user->name}}</td>
                        <td>{{$mda->uploader->name ?? 'System'}}</td>
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
