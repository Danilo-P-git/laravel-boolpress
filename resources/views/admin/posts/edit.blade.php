@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('admin.posts.update', $article->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="title">title</label>
    <input name="title" type="text" id="title" class="form-control" value="{{ $article->title }}">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input name="slug" type="text" id="slug" class="form-control" value="{{ $article->slug }}">
  </div>
  <div class="form-group">
    <label for="excerpt">Excerpt</label>
    <input name="excerpt" type="text" id="excerpt" class="form-control" value="{{ $article->excerpt }}">
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" class="form-control" id="content"> {{ $article->content }} </textarea>
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control" id="image" accept="image/*">
  </div>
  <input type="submit" class="btn btn-primary" value="Update">
  </form>
  </div>

  
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif
@endsection
