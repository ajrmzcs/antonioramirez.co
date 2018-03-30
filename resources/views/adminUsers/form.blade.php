{{ csrf_field() }}
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Insert your name"
           value="{{ old('name', $user->name) }}">
</div>
<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Insert your email"
           value="{{ old('email', $user->email) }}">
</div>
<div class="form-group">
    <label for="role">Roles</label>
    <div class="checkbox">
        <div>
            <label>
                <input type="checkbox" name="roles[]" value="1"
                       @if(old('roles') && in_array(1,old('roles'))) checked
                       @elseif(old('roles')===null && $dbRoles['admin']) checked
                        @endif>Administrator
            </label>
        </div>
        <div>
            <label>
                <input type="checkbox" name="roles[]" value="2"
                       @if(old('roles') && in_array(2,old('roles'))) checked
                       @elseif(old('roles')===null && $dbRoles['author']) checked
                        @endif>Author
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Insert a password">
</div>
<div class="form-group">
    <label for="password_confirmation">Confirm your password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
</div>
<div class="form-group">
    <label for="avatar">Avatar</label>
    <input type="file" class="form-control" id="avatar" name="avatar">
</div>
<button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;
<button type="reset" class="btn btn-danger">Reset</button>