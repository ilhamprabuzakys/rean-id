@php
   $company = cache()->remember('company', 60*60*7, function() {
      return \App\Models\Company::with(['social_media'])->first();
   })
@endphp
<div class="sidebar-widget-area">
   <h5 class="title">Tentang Rean</h5>
   <div class="widget-content">
      <p>
        {{ $company->about }}
      </p>
   </div>
</div>