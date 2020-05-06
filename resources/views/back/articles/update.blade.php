@extends('back.layouts.master')
@section('title',$article->title." meqalesini yenile")
@section('content')

<div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold  text-primary">@yield('title')</h6>


       </div>
      <div class="card-body">
      @if($errors->any())

      <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
      </div>
      @endif
              <form method="post" action="{{route('admin.articles.update',$article->id)}}"  enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text"name='title' class="form-control required" value="{{$article->title}}" ></input>

                  </div>
                  <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                      <option value="">secim edin</option>
                      @foreach($categories as $category)
                      <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Image</label><br> 
                   <img src="{{asset($article->image)}}"  alt="" class="thumbnail" style="width:200px">
                   <input type="file" name="image" class="form-control required"> </input>
                </div>

                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" class="form-control" id="editor" cols="30" rows="8">{{!!$article->content!!}</textarea>
                </div>
                <div class="form-group">

                <button type="submit" class="btn btn-primary btn-block">Update</button>
                     </div>
              
              </form>
      </div>
</div>
          


  @endsection
  @section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

  @endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#editor').summernote(
    {
      height:200
    }
  );
});
</script>



@endsection
