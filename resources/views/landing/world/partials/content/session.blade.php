@if (session('fails'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <span>{!! session('fails') !!}</span>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
@elseif(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   <span>{!! session('success') !!}</span>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
@elseif(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   <span>{!! session('status') !!}</span>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
@elseif(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   <span>{!! session('status') !!}</span>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
@endif