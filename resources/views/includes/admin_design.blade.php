<!DOCTYPE html>
<html lang="en">
@include('includes.head');
@php
$theme=App\Models\Theme::find(1);
@endphp
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('adminDashboard')}}" class="site_title"> <img src="{{ asset('public/uploads/theme/'.$theme->logo) }}" style="width: 100px"> <span>Dashboard</span></a>
            </div>

            <div class="clearfix"></div> 

            <!-- sidebar menu -->
            @include('includes.sidebar');
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('includes.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        
          @yield('content')
            
         
          <!-- /top tiles -->


               
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('includes.footer')
        <!-- /footer content -->
      </div>
    </div>

    @include('includes.script')
  </body>
</html>