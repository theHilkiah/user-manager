<form method="post" action="/admin/users/{{ $id ?? '' }}">
    @csrf
    @method('PUT')
    <fieldset>
        {{-- <legend class="d-inline text-center w-50">LOGIN</legend> --}}
        <div class="form-group">
            <label class="inline-label" for="name">Full Name</label>
            <input class="form-control" type="text" name="name" value="{{ $name ?? old('name') }}">
        </div>
        <div class="form-group">
            <label class="inline-label" for="name">Email</label>
            <input class="form-control" type="email" name="email" value="{{ $email ?? old('email') }}">
        </div>
        <div class="form-group">
            <label class="inline-label" for="name">Phone</label>
            <input class="form-control" type="tel" name="phone" value="{{ $phone ?? old('phone') }}">
        </div>
        <hr class="row">
        <div class="form-group">
            <label class="inline-label" for="name">Group</label>
            <select name="group_id" class="form-control">
                <option value="-1">(No group)</option>
                @foreach ($Groups as $group)
                    @php $selected = (@$group->id == @$group_id)? ' selected': ''; @endphp
                    <option value="{{$group->id}}"{{$selected}}>{{$group->label}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="inline-label" for="name">Status</label>
            <select name="status" class="form-control" required>
                <option value="">(Select Status)</option>
                @foreach (['pending', 'approved', 'suspended'] as $key => $status)
                    @php $selected = (@$group->status == @$key)? ' selected': ''; @endphp
                    <option value="{{$key}}"{{$selected}}>{{ ucwords($status)}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-row">
            <div class="col">

            </div>
            <div class="col">
                <button class="btn btn-block btn-primary" type="submit">Update</button>
            </div>
        </div>
    </fieldset>
</form>
