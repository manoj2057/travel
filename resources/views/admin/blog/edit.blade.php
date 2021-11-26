@extends('includes.admin_design')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Update Blog</h3>
            </div>

            
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Design </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        @include('includes._message')
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('updateBlog',$tag->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"> Select Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option selected disabled>Select a Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Blog Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="blog_title" value="{{$blog->blog_title}}"  class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="image" accept="image/*" class="form-control" onchange="readURL(this);">
                                    
                                </div>
                                <img src="{{asset ('public/uploads/blog/'.$blog->image)}}" style="width: 100px" id="one">
                        
                            </div> 
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Content <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="content" name="content" value="{{$blog->content}}"  class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Select Status <span class="required">*</span>
                                </label><br><br>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="checkbox" name="status" checked data-toggle="toggle" data-size="xs" value="1">
                                     <label>Active</label>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Background-Image<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="background-image" name="background_image" accept="image/*" class="form-control" onchange="readURL1(this);">
                                    
                                </div>
                                <img src="{{asset ('public/uploads/blog/'.$blog->background_image)}}" style="width: 100px" id="two">
                        
                            </div>
                            
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="update" class="btn btn-success">Update Blog</button>
                                </div>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        

        

        
    </div>
</div>
@endsection
@section('js')
<script>
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                $('#one')
                .attr('src',e.target.result)
                .width(100)
            };
            reader.readAsDataURL(input.files[0]);
        }



    }
    
</script>
<script>
    function readURL1(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                $('#two')
                .attr('src',e.target.result)
                .width(100)
            };
            reader.readAsDataURL(input.files[0]);
        }



    }
    
</script>

    
@endsection