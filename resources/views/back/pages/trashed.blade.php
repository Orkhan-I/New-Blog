@extends('back.layouts.master')
@section('title','Silinenler')
@section('content')

<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-right text-primary">
            <strong>{{$articles->count()}} yazi tapildi.</strong>
            <a href="{{route('admin.articles.index')}}" class="btn btn-primary" type="submit" >Aktiv yazilar <i class="fa fa-active"></i></a>
            
            </h6>

            <h6 class="m-0 font-weight-bold  text-primary">@yield('title')</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>hit</th>
                      <th>Start date</th>
                      <th>Works</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  @foreach($articles as $article)
                    <tr>
                      <td><img style="width:100px; height:100px" src="/{{$article->image}}" alt=""></td>
                      <td>{{$article->title}}</td>
                      <td>{{$article->getCategory->name}}</td>
                      <td>{{$article->hit}}</td>
                      <td>{{$article->created_at->diffForHumans()}}</td>
                     
                      <td>
                          <a href="{{route('admin.recover.article',$article->id)}}" title="qaytar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                          <a href="{{route('admin.hard.delete.article',$article->id)}}" title="sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                      
                      </td>
                    </tr>
                    @endforeach
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


@endsection

  @endsection
