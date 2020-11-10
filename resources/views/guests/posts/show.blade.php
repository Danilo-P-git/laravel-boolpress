@extends('layouts.guests')

@section('content')
  <h1>{{$article->title}}</h1>
  <h3>{{$article->slug}}</h3>
  <p>{{$article->content}}</p>
@endsection
