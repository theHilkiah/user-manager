<form action="/admin/users/{{ $User->id }}" method="post">
            @method('PUT')
            @csrf
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="enter notes title here...">
            <textarea name="content" class="form-control" placeholder="add notes content here..."></textarea>
            <button class="btn btn-block" name="notes" value="yes">Submit</button>
       </form>
