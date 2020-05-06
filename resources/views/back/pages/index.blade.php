@extends('back.layouts.master')
@section('title','Pages')
@section('content')





<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-right text-primary">
           
            
            </h6>

            <h6 class="m-0 font-weight-bold  text-primary">@yield('title')</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Order</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Works</th>
                    </tr>
                  </thead>
                 
                  <tbody id="orders">
                  @foreach($pages as $page)
                    <tr>
                    <td  id="handle" class="text-center"><i class="fa fa-arrows-alt-v fa-2x "></i></td>
                      <td><img style="width:100px;height:100px" src="/{{$page->image}}" alt=""></td>
                      <td>{{$page->title}}</td>
                      <td>
                      <input class="switch" page-id="{{$page->id}}" type="checkbox" data-on="aktiv" data-off="passiv" data-onstyle="success" data-offstyle="danger" @if($page->status==1) checked @endif data-toggle="toggle" data-size="mini">
                      </td>
                      <td>
                          <a target="_blank " href="{{route('page',[$page->slug])}}" title="bax" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                          <a href="{{route('admin.update.page',[$page->id])}}" title="deyis" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="{{route('admin.delete.page',[$page->id])}}" title="sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                         
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
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>
$('#orders').sortable({
  handle:'#handle',
  update:function(){
    var sira = $('#orders').sortable('serialize');
    $.get("{{route('admin.page.orders')}}?"+sira,function(data,status){
     
     
    });
  }
});
</script>
<script>
  $(function() {
    $('.switch').change(function() {
      id = $(this)[0].getAttribute('page-id');
      statu=$(this).prop('checked');
      $.get("{{route('admin.page.switch')}}", {id:id, statu:statu}, function(data,status){
        console.log(data);
      });
    })
  })
</script>

@endsection

  @endsection
