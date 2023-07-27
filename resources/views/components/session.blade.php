   @if (session('fails'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="bx bxs-badge-check me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('fails') !!}</span>
         </div>
      </div>
   @elseif(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="bx bxs-badge-check me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('success') !!}</span>
         </div>
      </div>
   @elseif(session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="bx bxs-badge-check me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('status') !!}</span>
         </div>
      </div>
   @elseif(session('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="bx bxs-badge-check me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('message') !!}</span>
         </div>
      </div>
   @endif
