<div class="d-flex align-items-center">
   <i
       class="mdi mdi-phone-outline mdi-24px cursor-pointer d-sm-block d-none me-1 btn btn-text-secondary btn-icon rounded-pill"></i>
   <i
       class="mdi mdi-video-outline mdi-24px cursor-pointer d-sm-block d-none me-1 btn btn-text-secondary btn-icon rounded-pill"></i>
   <i
       class="mdi mdi-magnify mdi-24px cursor-pointer d-sm-block d-none me-1 btn btn-text-secondary btn-icon rounded-pill"></i>
   <div class="dropdown">
       <i class="mdi mdi-dots-vertical cursor-pointer mdi-24px" id="chat-header-actions"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       </i>
       <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
           <a class="dropdown-item" href="{{ asset('javascript:void(0);') }}">View
               Contact</a>
           <a class="dropdown-item" href="{{ asset('javascript:void(0);') }}">Mute
               Notifications</a>
           <a class="dropdown-item" href="{{ asset('javascript:void(0);') }}">Block
               Contact</a>
           <a class="dropdown-item" href="{{ asset('javascript:void(0);') }}">Clear
               Chat</a>
           <a class="dropdown-item" href="{{ asset('javascript:void(0);') }}">Report</a>
       </div>
   </div>
</div>