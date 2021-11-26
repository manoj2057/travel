
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              @php
              $current_user = Auth::guard('admin')->user();
           @endphp
              <div class="profile_pic"><a href="{{ route('profile') }}">
                
                <img src="{{ asset('public/uploads/admin/'.$current_user->image) }}" alt="..." class="img-circle profile_img">
              </a></div>
              <div class="profile_info">
              
                <span>Welcome,</span>
                <h2><span>{{ $current_user->name }}</span></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a href="{{ route('adminDashboard') }}"><i class="fa fa-home"></i> Dashboard </a>
        
      </li>
      <li><a><i class="fa fa-cog"></i>Settings<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('theme') }}">Theme settings</a></li>
          <li><a href="{{ route('site')}}">Information settings</a></li>
          <li><a href="{{ route('seosite')}}">Seo settings</a></li>
          <li><a href="{{ route('socialsite')}}">Socialsite settings</a></li>
          
        </ul>
      </li>
      <li><a><i class="fa fa-cog"></i>Frontend settings</a>
        <ul class="nav child_menu">
          <li><a href="{{ route('slider') }}">Slider settings</a></li>
         
          
        </ul>
      </li>
      <li><a><i class="fa fa-cog"></i>Blog<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('indextag') }}">Tag settings</a></li>
          <li><a href="{{ route('category.index') }}">Category settings</a></li>
          <li><a href="{{ route('Blog.index') }}">Blog settings</a></li>
         
          
        </ul>
      </li>

      
    </ul>
  </div>
  

</div>