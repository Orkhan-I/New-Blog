@extends('back.layouts.master')
@section('title','Categories')
@section('content')


<div class="row">

<div class="col-md-4">

<!-- Modal -->

<form action="{{route('admin.create.category')}}" method="post">
@csrf
    <div class="form-group">
    <label for="">Category_Name</label>
    <input type="text" class="form-control" name='name'>
    <button type="submit" class="btn btn-primary btn-block mt-2 required">Create</button>
    </div>
</form>
</div>
<div class="col-md-8">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Count</th>
                      <th>Status</th>
                      <th>Isler</th>
                     
                    </tr>
                  </thead>
                 
                  <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <td>{{$category->name}}</td>
                      <td>{{$category->getCategoryCount()}}</td>
                      <td>
                      <input class="switch" category-id="{{$category->id}}" type="checkbox" data-on="aktiv" data-off="passiv" data-onstyle="success" data-offstyle="danger" @if($category->status==1) checked @endif data-toggle="toggle" data-size="mini">
                      </td>
                      <td>
                      <a category-id="{{$category->id}}"   class="btn btn-sm btn-primary edit" ><i class="fa fa-edit text-white"></i></a>
                      <a category-name="{{$category->name}}" category-id="{{$category->id}}" category-count="{{$category->getCategoryCount()}}"   class="btn btn-sm btn-danger remove" ><i class="fa fa-times text-white"></i></a>

                      </td>
                    </tr>
                    @endforeach
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
   </div>

 <div id="edit-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Category</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.update.category')}}" method="post">
        @csrf
        <div class="form-group">
        <label for="">Category_Name</label>
        <input type="text" class="form-control" id="category" name="category">
        <input type="hidden" name="id" id="category_id">
        </div>
        <div class="form-group">
        <label for="">Category_Slug</label>
        <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" >Save</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>








<div id="delete-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Category</h4>
      </div>
      <div class="modal-body alert alert-danger" id="modal-body">
      </div>

      <form action="{{route('admin.delete.category')}}" method="post">
      @csrf
      
      <input type="hidden" name="id" id="deleteId">
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Bagla</button>
        <button id="buttton" type="submit" class="btn btn-danger" >Sil</button>
      </div>
      </form>
      
     
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
    $('.remove').click(function(){
      id = $(this)[0].getAttribute('category-id');
      count = $(this)[0].getAttribute('category-count');
      name= $(this)[0].getAttribute('category-name');
      $('#deleteId').val(id);
      $('#delete-modal').modal();
      $('#modal-body').html('');
      $('#modal-body').hide();


        if(id==1){
          $('#modal-body').show();
          $('#modal-body').html(name+' sabit kateqoriyadir. silinecekler bura yuklenecekdir');
          $('#buttton').hide();
          return;
        }
        $('#buttton').show();
      if(count>0){
        $('#modal-body').html('kategoriya icersinde '+count+" meqale var. Heqiqeten silmek isteyirsiniz?");
     $('#modal-body').show();
      }

    });




    $('.edit').click(function(){
      id = $(this)[0].getAttribute('category-id');
      $.ajax({
        type: 'GET',
        url:'{{route("admin.category.getdata")}}',
        data:{id:id},
        success:function(data){
        console.log(data);
        $('#edit-modal').modal();
        $('#category').val(data.name);
        $('#slug').val(data.slug);
        $('#category_id').val(data.id);
        }
      })
    });

    $('.switch').change(function() {
      id = $(this)[0].getAttribute('category-id');
      statu=$(this).prop('checked');
      $.get("{{route('admin.category.switch')}}", {id:id, statu:statu}, function(data,status){
        console.log(data);
      });
    })
  })
</script>

@endsection

  @endsection
