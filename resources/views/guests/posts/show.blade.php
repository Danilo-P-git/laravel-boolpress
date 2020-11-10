@extends('layouts.guests')

@section('content')
  <div class="container" style="padding-top: 50px;height:100vh">


  <h1 class="text-center pb-5">{{$article->title}}</h1>
  <h3 class="pb-4">{{$article->slug}}</h3>
  <p style="font-size: 18px;">{{$article->content}}</p>
  </div>
@endsection
