<title> {{ config('app.name', 'Laravel') }}-Theme settings </title>
@extends('includes.admin_design')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Theme settings</h3>
            </div>

            
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        @include('includes._message')
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('updateTheme', $theme->id)}}"  enctype="multipart/form-data">
                        @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title"> Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="title" name="website_title" value="{{$theme->website_title}}"  class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="subtitle">Sub Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="subtitle" name="website_subtitle"  value="{{$theme->website_subtitle}}" class="form-control">
                                </div>
                            </div>

                            

                             <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Logo<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="logo" accept="image/*" class="form-control" onchange="readURL(this);">
                                </div>
                                
                                <img src="{{asset ('public/uploads/theme/'.$theme->logo)}}" style="width: 100px" id="one">
                        
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Favicon<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="favicon" accept="image/*" class="form-control" onchange="readURL1(this);">
                                </div>
                                
                                <img src="{{asset ('public/uploads/theme/'.$theme->favicon)}}" style="width: 40px" id="two">
                            </div>

                            
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="update" class="btn btn-success">Update Theme</button>
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

    function readURL1(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                $('#two')
                .attr('src',e.target.result)
                .width(40)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

    
@endsection