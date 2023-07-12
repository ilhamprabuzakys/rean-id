@php
   $company = cache()->remember('company', 60*60*7, function() {
      return \App\Models\Company::with(['social_media'])->first();
   })
@endphp
<div class="sidebar-widget-area">
   <h5 class="title">Social Media</h5>
   <div class="widget-content">
      <div class="social-area d-flex justify-content-between">
         <a href="{{ $company->social_media->facebook }}" class="social-facebook"><i class="fa fa-facebook"></i></a>
         <a href="{{ $company->social_media->twitter }}" class="social-twitter"><i class="fa fa-twitter"></i></a>
         <a href="{{ $company->social_media->youtube }}" class="social-youtube"><i class="fa fa-youtube-play"></i></a>
         <a href="{{ $company->social_media->instagram }}" class="social-instagram"><i class="fa fa-instagram"></i></a>
         <a href="{{ $company->social_media->whatsapp }}" class="social-whatsapp"><i class="fa fa-whatsapp"></i></a>
      </div>
   </div>
</div>