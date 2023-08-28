<!-- Chats List -->
<ul class="list-unstyled chat-contact-list" id="chat-list">
    <li class="chat-contact-list-item chat-contact-list-item-title">
        <h5 class="text-primary mb-0">Chats</h5>
    </li>
    @forelse ($conversations as $conversation)
    <li class="chat-contact-list-item {{ $conversation_active_id == $conversation->id ? 'active' : '' }}" wire:key='{{ $conversation->id }}'
        wire:click="$dispatch('chatUserSelected', { conversation: {{ $conversation }}, receiverId: {{ $this->getChatUserInstance($conversation, $name='id') }} })">
        <a class="d-flex align-items-center" wire:poll>
            <div
                class="flex-shrink-0 avatar avatar-{{ $this->getChatUserInstance($conversation, $name='status') == 'online' ? 'online' : 'offline' }}">
                @if ($this->getChatUserInstance($conversation, $name='avatar') == null)
                <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="Avatar" class="rounded-circle" style="object-fit: cover">
                @else
                <img src="{{ asset($this->getChatUserInstance($conversation, $name='avatar')) }}" alt="Avatar"
                    class="rounded-circle" style="object-fit: cover">
                @endif
            </div>
            <div class="chat-contact-info flex-grow-1 ms-3">
                <h6 class="chat-contact-name text-truncate m-0">{{ $this->getChatUserInstance($conversation,
                    $name='name') }}</h6>
                <p class="chat-contact-status text-truncate mb-0">{{ $conversation->messages->last()->body ?? '' }}</p>
            </div>
            <small class="text-muted mb-auto">{{ \Carbon\Carbon::parse($conversation->last_time_message)->format('m: i a') ?? '' }}</small>
        </a>
    </li>
    @empty
    <li class="chat-contact-list-item contact-list-item-0">
        <h6 class="text-muted mb-0">Kamu belum memulai chat apapun.</h6>
    </li>
    @endforelse
</ul>