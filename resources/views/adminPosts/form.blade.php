{{ csrf_field() }}
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Insert post title"
           value="{{ old('title', $post->title) }}">
</div>
<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" placeholder="Insert post slug"
           value="{{ old('slug', $post->slug) }}">
</div>
<div class="form-group">
    <label for="excerpt">excerpt</label>
    <textarea class="form-control" id="excerpt" name="excerpt" placeholder="Insert post excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
</div>
<div class="form-group">
    <label for="categories">Categories</label><br>
    @foreach($categories as $category)
            <label class="checkbox-inline checkbox-custom-margin">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                       @if(old('categories') && in_array($category->id,old('categories'))) checked
                       @elseif(old('categories')===null && in_array($category->id,$dbCategories)) checked
                        @endif>{{ $category->name }}</label>
    @endforeach
</div>
<div class="form-group">
    <label for="content">Content</label>
    <input id="body" type="hidden" name="body" value="{{ $post->body }}">
    <trix-editor input="body"></trix-editor>
</div>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Insert post image"
           value="{{ old('image') }}">
</div>
<div class="form-group">
    <label for="name">Status</label>
    <select class="form-control" name="published">
        <option value="">-- Select status --</option>
        <option value="0" @if($post->published===false) selected @endif>Draft</option>
        <option value="1" @if($post->published===true) selected @endif>Published</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;
<button type="reset" class="btn btn-danger">Reset</button>