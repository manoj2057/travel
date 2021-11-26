<title> {{ config('app.name', 'Laravel') }}-change password </title>
@extends('includes.admin_design')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Change Password -{{ config('app.name', 'Laravel') }}</h3>
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('updatePassword',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="current_password"> Old Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" id="current_password" name="current_password"  class="form-control ">
                                </div>
                                <p id="correct_password"></p>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password"> New Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" id="confirm_password" name="password"  class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pass"> Confirm Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" id="pass" name="confirm_password"  class="form-control ">
                                </div>
                            </div>
                           
                           
                            
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="update" class="btn btn-success">Update Password</button>
                                </div>
                            </div>

                            <div class="mt-4 text-center">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    Go to Login page <a href="{{ route('forgetPassword')}}">Click here</a>
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
          $("#current_password").keyup(function (){
              var current_password = $("#current_password").val();
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                  },
                  type: 'post',
                  url: '{{ route('chkUserPassword') }}',
                  data: {
                      current_password:current_password
                  },
                  success: function (resp){
                      if(resp=="true"){
                          $("#correct_password").text("Current password matches").css("color", "green");
                      } else if (resp == "false"){
                          $("#correct_password").text("Password does not matches").css("color", "red");
                      }
                  }, error: function (resp){
                      alert("Error");
                  }
              });
          });
    </script>
@endsection
