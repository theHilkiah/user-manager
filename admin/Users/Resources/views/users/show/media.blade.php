@if($User->media->count())
<table class="table data-table">
<thead>
    <tr>
    <td>Preview</td>
    <td>File Path/Title</td>
    </tr>
</thead>
<tbody>
    @foreach ($User->media->sortByDesc('created_at') as $mda)
    @php $file = '<img class="img-thumbnail" '. $mda->preview .'>'; @endphp
    <tr>
    <td>
        <a href="#file-{{ $mda->id }}" data-toggle="popover" data-html="true" data-trigger="hover" data-content="{{ $file }}">
        <img class="img-thumb-128" {!! $mda->preview !!}>
        </a>
    </td>
    <td>
        <a href="{{$mda->url}}" data-toggle="tooltip" title="{{$mda->file}}" target="_blank">{{$mda->title}}</a></td>
    </tr>
@endforeach
</tbody>
</table>
@else
- There are no files uploaded for {{$User->name}} currently
@endif