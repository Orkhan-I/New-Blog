@extends('back.layouts.master')
@section('title','Settings')
@section('content')





            <div class="card-body">
             
            <form method="post" action="{{route('admin.update.configs')}}">
            @csrf
             <div class="row">
                  <div class="col-md-6">
                     <label for="">Title</label>
                      <input class="form-control" name="title" type="text" value="{{$config->title}}">
                  </div>

                  <div class="col-md-6">
                  <label for="">Status</label>
                      <select name="status" class="form-control" id="">
                          <option @if($config->active==1) selected  @endif value="1">Aktiv</option>
                          <option @if($config->active==0) selected  @endif value="0">Passiv</option>
                      </select>
                  </div>

              </div>

              <div class="row">
                  <div class="col-md-6">
                  <br>
                     <label for="">Logo</label>
                      <input class="form-control" name="logo" type="file" >
                  </div>

                  <div class="col-md-6">
                  <br>
                  <label for="">Favicon</label>
                  <input class="form-control" name="favicon" type="file" >
                  </div>

              </div>

              <div class="row">
                  <div class="col-md-6">
                  <br>
                     <label for="">Facebook</label>
                      <input class="form-control" name="facebook" type="text" value="{{$config->facebook}}">
                  </div>

                  <div class="col-md-6">
                  <br>
                  <label for="">Instagram</label>
                  <input class="form-control" name="instagram" type="text" value="{{$config->instagram}}">
                  </div>

              </div>

              <div class="row">
                  <div class="col-md-6">
                  <br>
                     <label for="">Youtube</label>
                      <input class="form-control" name="youtube" type="text" value="{{$config->youtube}}">
                  </div>

                  <div class="col-md-6">
                  <br>
                  <label for="">Github</label>
                  <input class="form-control" name="github" type="text" value="{{$config->github}}">
                  </div>

              </div>

              <div class="form-group">
              <br>
                  <button type="submit" class="btn btn-primary btn-block">Gucelle</button>
              </div>
             </form>
              
            </div>
          </div>

@endsection



