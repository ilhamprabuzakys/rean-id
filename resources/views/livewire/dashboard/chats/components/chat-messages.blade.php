<ul class="list-unstyled chat-history" id="chat_body">
   @forelse ($messages as $message)

   @if ($message->sender_id == auth()->user()->id)
   <li class="chat-message chat-message-right" wire:key='{{ $message->id }}'>
       <div class="d-flex overflow-hidden">
           <div class="chat-message-wrapper flex-grow-1">
               <div class="chat-message-text">
                   <p class="mb-0">{{ $message->body }}</p>
               </div>
               <div class="text-end text-muted">
                   <i class='mdi mdi-check-all mdi-14px text-success me-1'></i>
                   <small>{{ $message->created_at->format('m: i a') }}</small>
               </div>
           </div>
           <div class="user-avatar flex-shrink-0 ms-3">
               <div class="avatar avatar-sm">
                   @if ($message->user->avatar == null)
                   <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="Avatar"
                       class="rounded-circle">
                   @else
                   <img src="{{ asset($message->user->avatar) }}" alt="Avatar" class="rounded-circle">
                   @endif
               </div>
           </div>
       </div>
   </li>
   @else
   <li class="chat-message">
       <div class="d-flex overflow-hidden">
           <div class="user-avatar flex-shrink-0 me-3">
               <div class="avatar avatar-sm">
                   @if ($message->user->avatar == null)
                   <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="Avatar"
                       class="rounded-circle">
                   @else
                   <img src="{{ asset($message->user->avatar) }}" alt="Avatar" class="rounded-circle">
                   @endif
               </div>
           </div>
           <div class="chat-message-wrapper flex-grow-1">
               <div class="chat-message-text">
                   <p class="mb-0">{{ $message->body }}</p>
               </div>
               <div class="text-muted">
                   <small>{{ $message->created_at->format('m: i a') }}</small>
               </div>
           </div>
       </div>
   </li>
   @endif
   @empty
   @endforelse
</ul>
