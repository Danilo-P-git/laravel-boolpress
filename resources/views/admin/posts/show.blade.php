@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="container-fluid text-center">
      <img class="img-fluid" src="{{asset('storage/'.$article->image)}}" alt="">
    </div>
    <h1>{{$article->title}}</h1>
    <div>
      <h2>{{$article->slug}}</h2>
      <br>
      <p>{{$article->content}}</p>
      <br>
      <p>{{$article->excerpt}}</p>
    </div>

    <form action="{{route('admin.posts.destroy', $article->id)}}" method="POST">
    @method("DELETE")
    @csrf
    <button type="submit" value="delete" class="btn btn-danger">Delete</button>

    </form>
  </div>
@endsection
