@extends('front.layouts.master')
@section('title','contact')
@section('bg','https://benlomandconnect.com/wp-content/uploads/2017/01/Ben-Lomand-Connect-Contact-Us-Icons.png')
@section('content')

    <div class="container">
      <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
         @if($errors->any())
         <div class="alert alert-danger">
           <ul>
           @foreach($errors->all() as $error)
           <li>{{$error}}</li>
           @endforeach
          </ul>   
         </div>
         @endif
        <form method="post" action="{{route('contact.post')}}"> 
            @csrf
          <div class="control-group">
            <div class="controls">
              <label>name</label>
              <input type="text" class="form-control" value="{{old('name')}}" placeholder="Name" id="name" name="name" required >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group  controls">
              <label>Email Address</label>
              <input type="email" class="form-control" value="{{old('email')}}" placeholder="Email Address" id="email" name="email" required >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
           <div class="form-group controls">
           <select name="topic" id="" class="form-control">
              <option @if(old('topic')=="one") selected @endif >one</option>
              <option  @if(old('topic')=="two") selected @endif>two</option>
              <option  @if(old('topic')=="three") selected @endif>three</option>
            </select>
           </div>
          </div>
          <div class="control-group">
            <div class="form-group  controls">
              <label>Message</label>
              <textarea rows="5" class="form-control"placeholder="Message" id="message" name="message" required >{{old('message')}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
         
            @if(session('success'))
              <div id="success" class="alert alert-danger">
                {{session('success')}}
              </div>
            @endif
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>

      </div>
    </div>

    

  
@endsection
  <!-- Footer -->
  

  <!-- Bootstrap core JavaScript -->
 