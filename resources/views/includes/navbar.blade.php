<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
        @php
           $current_user = Auth::guard('admin')->user();
        @endphp

      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('public/uploads/admin/'.$current_user->image) }}" alt=""><span>{{ $current_user->name }}</span>
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="{{route('profile')}}">My Profile</a>
              
              </a>
              <a class="dropdown-item" href="{{ route('changePassword') }}">Change Password</a>
            <a class="dropdown-item"  href="{{route ('adminlogout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </div>
        </li>

        
        
      </ul>
    </nav>
  </div>
</div>