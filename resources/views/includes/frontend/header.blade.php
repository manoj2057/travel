<div class="top-header">
   @php
		  $site=App\Models\Site::find(1);
		@endphp
    <div class="container">
       <div class="row">
          <div class="col-lg-8 d-none d-lg-block">
             <div class="header-contact-info">
                <ul>
                   <li>
                      <a href="#"><i class="fas fa-phone-alt"></i> {{$site->phoneno}} </a>
                   </li>
                   <li>
                      <a href="mailto:info@Travel.com"><i class="fas fa-envelope"></i> {{$site->email}}</a>
                   </li>
                   <li>
                      <i class="fas fa-map-marker-alt"></i> {{$site->location}}
                   </li>
                </ul>
             </div>
          </div>
          <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
             <div class="header-social social-links">
                <ul>
                   <li><a href="{{$site->facebook}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                   <li><a href="{{$site->twitter}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                   <li><a href="{{$site->insta}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                   <li><a href="{{$site->linkdin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
             </div>
             <div class="header-search-icon">
                <button class="search-icon">
                   <i class="fas fa-search"></i>
                </button>
             </div>
          </div>
       </div>
    </div>
 </div>

  <!-- custom search field html -->
  <div class="header-search-form">
    <div class="container">
       <div class="header-search-container">
          <form class="search-form" role="search" method="get" >
             <input type="text" name="s" placeholder="Enter your text...">
          </form>
          <a href="#" class="search-close">
             <i class="fas fa-times"></i>
          </a>
       </div>
    </div>
 </div>
<!-- header html end -->