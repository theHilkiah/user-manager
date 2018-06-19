<form action="/admin/users/{{ $User->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="enter notes title here...">
            </div>
            <div class="form-group">
                <textarea name="content" class="form-control" placeholder="add notes content here..." rows="5" required>{{old('content')}}</textarea>
            </div>
            <div class="form-group row">
                <div class="col">
                    <select name="type" class="form-control">
                        <option value="1">Note to Self</option>
                        <option value="2">Note to User</option>
                        <option value="3">Note for All</option>
                    </select>
                </div>
                <div class="col">
                    <button class="btn btn-block btn-primary" name="active" value="notes">Submit</button>
                </div>
            </div>
       </form>
