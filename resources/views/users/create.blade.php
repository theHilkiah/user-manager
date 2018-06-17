<form method="post" action="/admin/users/{{ $id ?? '' }}">
    <fieldset>
        <legend class="d-inline text-center w-50">LOGIN</legend>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input class="form-control" type="text" name="name" value="{{ $name ?? old('name') }}">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input class="form-control" type="email" name="email" value="{{ $email ?? old('email') }}">
        </div>
        <div class="form-group">
            <label for="name">Phone</label>
            <input class="form-control" type="tel" name="phone" value="{{ $phone ?? old('phone') }}">
        </div>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input class="form-control" type="text" name="name" value="{{ $name ?? old('name') }}">
        </div>
    </fieldset>
</form>