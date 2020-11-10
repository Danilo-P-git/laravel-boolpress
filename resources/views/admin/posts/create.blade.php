@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('post')
    <div class="form-group">
    <label for="title">title</label>
    <input name="title" type="text" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input name="slug" type="text" id="slug" class="form-control" >
  </div>
  <div class="form-group">
    <label for="excerpt">Excerpt</label>
    <input name="excerpt" type="text" id="excerpt" class="form-control" >
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" class="form-control" id="content"> </textarea>
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control" id="image" accept="image/*">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
@endsection
