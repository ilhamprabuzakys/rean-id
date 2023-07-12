<div
   class="hero-area height-700 bg-img background-overlay"
   style="background-image: url({{ asset('assets/Landing/world/img/blog-img/bg4.jpg') }})">
   <div class="container h-100">
      <div
         class="row h-100 align-items-center justify-content-center">
         <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center">
               <div class="post-cta py-2"><a href="#">{{ $heropost->category->name }}</a></div>
               <h3>
                  {{ $heropost->title }}
               </h3>
            </div>
         </div>
      </div>
   </div>
</div>