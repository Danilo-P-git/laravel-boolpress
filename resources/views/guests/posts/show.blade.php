@extends('layouts.guests')

@section('content')
  <?php
  $image = $article->image;
  $pos = strpos($image, "placeholder");

   ?>
  <div class="container" style="padding-top: 50px;height:100vh">
    <div class="container-fluid text-center">
      

    <?php if ($pos === false) {?>
      <img class="img-fluid" src=" {{asset('storage/'.$article->image)}}" alt="Card image cap">

    <?php } else {?>
        <img class="img-fluid" src="{{$article->image}}" alt="Card image cap">
    <?php }?>
    </div>
  <h1 class="text-center pb-5">{{$article->title}}</h1>
  <h3 class="pb-4">{{$article->slug}}</h3>
  <p style="font-size: 18px;">{{$article->content}}</p>
  </div>
@endsection
