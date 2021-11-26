@extends('includes.admin_design')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Category</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <button type="button" class="btn btn-primary"><a href="{{route('addCategory')}}" style="color:white">Add Category</a></button>
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
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>


                {{-- <tbody>
                    @foreach($sliders as $slider)

                    
                  <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->image}}</td>
                    <td>{{$slider->content}}</td>
                    <td>{{$slider->order}}</td>
                    <td>{{$slider->status}}</td>
                    <td>{{$slider->url}}</td>
                    <td><a href="{{route('editSlider',$slider->id)}}">Edit</a>
                        <a href="{{route('deleteSlider',$slider->id)}}">Delete</a>
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
    ajax:"{{route('tableCategory')}}",
    columns:[
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'category_name', name: 'category_name'},
      {data: 'slug', name: 'slug'},
      {data: 'status', name: 'status'},
      
      {data: 'action', name: 'action', orderable:false},
    ]

  });
</script>
@endsection

