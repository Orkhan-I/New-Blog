@extends('back.layouts.master')
@section('title','Messages')
@section('content')

<div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold  text-primary">@yield('title')</h6>


       </div>
      <div class="card-body">
      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    
                      <th>Name</th>
                      <th>Mail</th>
                      <th>Topic</th>
                      <th>Message</th>
                      <th>Sil</th>
                    </tr>
                  </thead>
                 
                  <tbody id="orders">
                  @foreach($contacts as $contact)
                    <tr>
                    <td >{{$contact->name}} </td>
                      <td>{{$contact->mail}}</td>
                      <td>{{$contact->topic}}</td>
                      <td>{{$contact->message}}</td>
                     <td> <a href="{{route('admin.delete.message',[$contact->id])}}" title="sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    </tr>
    
        @endforeach
          


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
