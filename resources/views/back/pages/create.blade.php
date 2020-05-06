@extends('back.layouts.master')
@section('title','create')
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
              <form method="post" action="{{route('admin.create.page.post')}}"  enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text"name='title' class="form-control required" ></input>

                  </div>
                 

                <div class="form-group">
                    <label for="">Image</label>
                   <input type="file" name="image" class="form-control required"> </input>
                </div>

                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" class="form-control" id="editor" cols="30" rows="8"></textarea>
                </div>
                <div class="form-group">

                <button type="submit" class="btn btn-primary btn-block">Create</button>
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
