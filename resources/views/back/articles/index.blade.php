@extends('back.layouts.master')
@section('title','Articles')
@section('content')

<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-right text-primary">
            <strong>{{$articles->count()}} yazi tapildi.</strong>
            <a href="{{route('admin.trashed.article')}}" class="btn btn-warning" type="submit" >Silinen yazilar <i class="fa fa-trash"></i></a>
            
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
                      <th>Status</th>
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
                      <input class="switch" article-id="{{$article->id}}" type="checkbox" data-on="aktiv" data-off="passiv" data-onstyle="success" data-offstyle="danger" @if($article->status==1) checked @endif data-toggle="toggle" data-size="mini">
                      </td>
                      <td>
                          <a target="_blank " href="{{route('blog.single',[$article->getCategory->slug,$article->slug])}}" title="bax" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                          <a href="{{route('admin.articles.edit',$article->id)}}" title="deyis" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                          <a href="{{route('admin.delete.article',$article->id)}}" title="sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                      
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
<script>
  $(function() {
    $('.switch').change(function() {
      id = $(this)[0].getAttribute('article-id');
      statu=$(this).prop('checked');
      $.get("{{route('admin.switch')}}", {id:id, statu:statu}, function(data,status){
        console.log(data);
      });
    })
  })
</script>

@endsection

  @endsection
