 @if($Notes->count()) @foreach ($Notes->sortByDesc('created_at') as $note)
    <blockquote class="blockquote">
        <strong>{{ $note->title }}</strong> -
        <small>{{$note->type}}</small>
        <p class="mb-0 truncate w-sm" data-toggle="tooltip" data-trigger="hover" data-title="{!! $note->content !!}">{!! $note->content !!}</p>
        <footer class="blockquote-footer">
            <cite title="Source Title">{{ $note->signature }}</cite>
        </footer>
    </blockquote>
@endforeach 
@else 
<p>
    - There are no notes on {{$User->name}} currently 
</p>
@endif