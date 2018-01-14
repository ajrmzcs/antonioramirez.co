{{ csrf_field() }}
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Insert category name"
           value="{{ old('name', $category->name) }}">
</div>
<button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;
<button type="reset" class="btn btn-danger">Reset</button>