@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-6">
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary" >Create a new article</a>
      </div>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Titolo</th>
      <th scope="col">Slug</th>
      <th scope="col">Contenuto</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($articles as $article)
      <tr>
        <td>{{$article->title}}</td>
        <td>{{$article->slug}}</td>
        <td>{{$article->content}}</td>
        <td>
          <a href="{{route('admin.posts.show', $article)}}">View</a>
          <a href="{{route('admin.posts.edit', $article)}}">Edit</a>


        </td>

      </tr>
    @endforeach
  </tbody>
</table>
  </div>
@endsection
