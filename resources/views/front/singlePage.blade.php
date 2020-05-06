@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',"/".$article->image)
@section('content')
<article style="width:100%">
    <div class="container">
      <div class="row">
        <div class="col-md-9 mx-auto">
        {{$article->content}} <br>
        <span class="text-danger">Oxunma sayi: <b>{{$article->hit}}</b></span>
        </div>
        @include('widgets.categoryWidget')
      </div>
    </div>
  </article>
    

  
@endsection
  <!-- Footer -->
  

  <!-- Bootstrap core JavaScript -->
 