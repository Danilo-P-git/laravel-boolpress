@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('posts.update', $article->id)}}" method="POST">
    @method('PUT')
    @csrf
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
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
@endsection
