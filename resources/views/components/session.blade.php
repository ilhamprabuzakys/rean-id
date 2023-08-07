   @if (session('fails'))
      {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="bx bxs-badge-check me-3"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('fails') !!}</span>
         </div>
      </div> --}}
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="mdi mdi-alert-circle-outline me-3"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('fails') !!}</span>
         </div>
      </div>
   @elseif(session('errors'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="mdi mdi-alert-circle-outline me-3"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="mb-0 ps-0">
               @forelse ($errors->all() as $error)
                  <li class="d-flex">{{ $error }}</li>
               @empty
                  
               @endforelse
            </ul>
         </div>
      </div>
   @elseif(session('success'))
      {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="bx bxs-badge-check me-3"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('success') !!}</span>
         </div>
      </div> --}}
       <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
         <i class="mdi mdi-check-circle-outline me-3"></i>
         <span>{!! session('success') !!}</span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
         </button>
       </div>
   @elseif(session('status'))
      {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="bx bxs-badge-check me-3"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('status') !!}</span>
         </div>
      </div> --}}
      <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
         <i class="mdi mdi-check-circle-outline me-3"></i>
         <span>{!! session('status') !!}</span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
         </button>
       </div>
   @elseif(session('message'))
      {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
         <div class="d-flex align-items-center">
            <i class="bx bxs-badge-check me-3"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{!! session('message') !!}</span>
         </div>
      </div> --}}
      <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
         <i class="mdi mdi-check-circle-outline me-3"></i>
         <span>{!! session('message') !!}</span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
         </button>
       </div>
   @endif
