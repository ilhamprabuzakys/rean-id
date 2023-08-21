<div class="flex-shrink-0 avatar avatar-online">
   @if ($receiverInstance->avatar == null)
   <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="Avatar" class="rounded-circle"
       data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-right">
   @else
   <img src="{{ asset($receiverInstance->avatar) }}" alt="Avatar" class="rounded-circle"
       data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-right">
   @endif
</div>
<div class="chat-contact-info flex-grow-1 ms-3">
   <h6 class="m-0">{{ $receiverInstance->name }}</h6>
   <span class="user-status text-body">{{ $receiverInstance->email }}</span>
</div>