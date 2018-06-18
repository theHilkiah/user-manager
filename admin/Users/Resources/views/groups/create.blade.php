<form action="/admin/groups" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <label for="name">Group Name</label>
            <input type="text" name="label" class="form-control">
        </div>
        <div class="col">
            <label for="name">Group Under:</label>
            <select name="group_id" class="form-control">
                <option value="-1">(original group)</option>
                @foreach ($Groups as $group)
                    <option value="{{$group->id}}">{{$group->label}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="permissions">Permissions</label>
        <select name="permissions[]" class="form-control select2" multiple="multiple">
            <option value="">(select one or more)</option>
            <option value="1">Can write</option>
            <option value="2">Can edit</option>
            <option value="3">Can delete</option>
            <option value="4">Can view</option>
        </select>
    </div>
    <div class="form-row">
        <div class="col">

        </div>
        <div class="col">
            <button type="submit" class="btn btn-block btn-primary">Submit</button>
        </div>
    </div>
</form>
