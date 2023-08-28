<!-- Contacts -->
<ul class="list-unstyled chat-contact-list" id="contact-list">
    <li class="chat-contact-list-item chat-contact-list-item-title">
        <h5 class="text-primary mb-0">Daftar Kontak</h5>
    </li>
    @forelse ($users as $user)
    <li class="chat-contact-list-item" wire:key='{{ $user->id }}' wire:click='checkConversation({{ $user->id }})'>
        <a class="d-flex align-items-center">
            <div class="flex-shrink-0 avatar avatar-{{ $user->status == 'online' ? 'online' : 'offline' }}">
                @if ($user->avatar == null)
                <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="Avatar" class="rounded-circle" style="object-fit: cover">
                @else
                <img src="{{ asset($user->avatar) }}" alt="Avatar" class="rounded-circle" style="object-fit: cover">
                @endif
            </div>
            <div class="chat-contact-info flex-grow-1 ms-3">
                <h6 class="chat-contact-name text-truncate m-0">{{ $user->name }}</h6>
                <p class="chat-contact-status text-truncate mb-0">{{ $user->email }}</p>
            </div>
        </a>
    </li>
    @empty
    <li class="chat-contact-list-item contact-list-item-0 d-none">
        <h6 class="text-muted mb-0">Tidak ada kontak ditemukan.</h6>
    </li>
    @endforelse
</ul>