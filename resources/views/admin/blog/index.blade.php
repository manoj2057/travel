@extends('includes.admin_design')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Blog</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <button type="button" class="btn btn-primary"><a href="{{route('addBlog')}}" style="color:white">Add Blog</a></button>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              
              <table id="slider-datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>S.N</th>
                    <th> BlogTitle</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>content</th>
                    <th>Admin_id</th>
                    <th>View Count</th>
                    <th>Status</th>
                    <th>Background Image</th>
                    <th>Category_Id</th>
                    <th>Action</th>
                  </tr>
                </thead>
                {{-- <tbody>
                    @foreach($blogs as $blog)

                    
                  <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->blog_title}}</td>
                    <td>{{$blog->slug}}</td>
                    <td><img src="{{ asset ('public/uploads/blog/'.$blog->image)}}" style="width:100px";> </td>
                    <td>{{$blog->content}}</td>
                    <td>{{$blog->admin_id}}</td>
                    <td>{{$blog->viewcount}}</td>
                    <td>{{$blog->status}}</td>
                    <td><img src="{{ asset ('public/uploads/blog/'.$blog->background_image)}}" style="width:100px";> </td>
                    <td>{{$blog->category_id}}</td>
                    <td><a href="{{route('edit',$blog->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i>Edit</a>
                        <a href="{{route('delete',$blog->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i>Delete</a>

                        
                    </td>
                    

                  </tr>
                  @endforeach
                </tbody> --}}
               
              </table>
            </div>
            </div>
        </div>
      </div>
    </div>
</div>      
        
       
@endsection

@section('js')
<script src="{{asset('public/dashboard/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/pdfmake/build/vfs_fonts.js')}}"></script> 

<script>
  $("#slider-datatable").DataTable({
    processing:true,
    serverSide:true,
    sorting:true,
    serachable:true,
    responsive:true,
    ajax:"{{route('tableBlog')}}",
    columns:[
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'blog_title', name: 'blog_title'},
      {data: 'slug', name: 'slug'},
      {data: 'image', name: 'image',
                    render: function (data, type, full, meta){
                        if(data){
                            return "<img src={{ URL::to('/') }}/public/uploads/blog/" + data + " width='120' >";
                        }
                        return "<img src={{ URL::to('/') }}/public/default/noimage.jpg" + " width='120' >";
                    }
                },

      
      {data: 'content', name: 'content'},
      {data: 'admin_id', name: 'admin_id'},
      {data: 'viewcount', name: 'viewcount'},
      {data: 'status', name: 'status'},

      {data: 'background_image', name: 'background_image',
                    render: function (data, type, full, meta){
                        if(data){
                            return "<img src={{ URL::to('/') }}/public/uploads/blog/" + data + " width='120' >";
                        }
                        return "<img src={{ URL::to('/') }}/public/default/noimage.jpg" + " width='120' >";
                    }
                },
                {data: 'category_id', name: 'category_id'},

      {data: 'action', name: 'action', orderable:false},
    ]
  });
</script>
@endsection
