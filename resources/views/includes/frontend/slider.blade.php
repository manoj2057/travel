<div class="home-slider">
    @foreach($sliders as $slider)
   <div class="home-banner-items">
      <div class="banner-inner-wrap" style="background-image: url({{asset('public/uploads/slider/'.$slider->image)}} );"></div>
         <div class="banner-content-wrap">
            <div class="container">
               <div class="banner-content text-center">
                  <h2 class="banner-title">{{$slider->title}}</h2>
                  <p>{{$slider->content}}</p>
                  <a href="{{$slider->url}}" class="button-primary">Continue Reading</a>
               </div>
            </div>
         </div>
      <div class="overlay"></div>
   </div>
   @endforeach
   
</div>