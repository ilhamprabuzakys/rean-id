@if (session('fails'))
<div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   <div class="alert-icon">
      <i class="fas fa-xmark"></i>
   </div>
   <div class="alert-message">
      {!! session('fails') !!}
   </div>
</div>
@elseif(session('success'))
<div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   <div class="alert-icon">
      <i class="fas fa-check"></i>
   </div>
   <div class="alert-message">
      {!! session('success') !!}
   </div>
</div>
@elseif(session('status'))
<div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   <div class="alert-icon">
      <i class="fas fa-info-circle"></i>
   </div>
   <div class="alert-message">
      {!! session('status') !!}
   </div>
</div>
@elseif(session('message'))
<div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   <div class="alert-icon">
      <i class="fas fa-check"></i>
   </div>
   <div class="alert-message">
      {!! session('message') !!}
   </div>
</div>
@endif
