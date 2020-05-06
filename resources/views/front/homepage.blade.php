@extends('front.layouts.master')
@section('title',$config->title)
@section('content')
  <!-- Main Content -->

      <div class="col-md-9 mx-auto">
        
        @foreach($articles as $article)
        <div class="post-preview">
          <a href="{{route('blog.single',[$article->getCategory->slug, $article->slug]) }}">
            <h2 class="post-title">
            {{$article->title}}
            </h2>
            <img style="width:100%" src="/{{$article->image}}" alt="">
            <h3 class="post-subtitle">
              {{str_limit($article->content,80,'__davami...')}}
            </h3>
          </a>
          <p class="post-meta">
            <a href="#">Category:{{$article->getCategory->name}}</a>
            <span class="float-right">{{$article->created_at->diffForHumans()}}</span></p>
        </div>

        @if(!$loop->last)
        <hr>
        @endif
           
           
        @endforeach

        
              
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
     @include('widgets.categoryWidget')

     {{$articles->links()}}

  
@endsection
  <!-- Footer -->
  

  <!-- Bootstrap core JavaScript -->
 