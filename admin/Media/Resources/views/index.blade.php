@extends('media::layouts.master')

@section('content')
    <div class="table-responsive">
        <table class="table data-table">
            <thead class="thead-dark">
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
                @php $file = '<img class="img-thumbnail" '.$mda->preview .'>'; @endphp
                    <tr>
                        <td>{{$mda->id}}</td>
                        <td>
                            <a href="#file-{{ $mda->id }}" data-toggle="popover" data-html="true" data-trigger="hover" data-content="{{ $file }}">
                            <img class="img-thumb-128" {!!$mda->preview!!}>
                            </a>
                        </td>
                        <td>{{$mda->file}}</td>
                        <td>{{$mda->user->name}}</td>
                        <td>{{$mda->uploader->name ?? 'System'}}</td>
                        <td>{{$mda->type}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function(){
            $('.data-table').DataTable();
        });
    </script>
    @endpush

@endsection
