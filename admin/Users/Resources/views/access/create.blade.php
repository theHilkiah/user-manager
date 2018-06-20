<form action="{{ url()->current() }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-md-6">
            <label for="label" class="inline-label">Label</label>
            <input type="text" class="form-control" name="label" value="{{ $label or old('label') }}" required>
        </div>
        <div class="col">
            <label for="score" class="inline-label">Score</label>
            <input type="text" class="form-control" name="score" value="{{ $score or old('score') }}">
        </div>
        <div class="col">
            <label for="code" class="inline-label">Code</label>
            <input type="text" class="form-control" name="code" value="{{ $code or old('code') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="title" class="inline-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $title or old('title') }}" required>
    </div>
    <div class="form-group">
        <label for="desc" class="inline-label">Description</label>
        <textarea class="form-control" name="desc" required>{{ $desc or old('desc') }}</textarea>
    </div>
    <div class="form-group">
        <button class="btn">
                Submit <span class="badge badge-primary"></span>
        </button>
    </div>
</form>