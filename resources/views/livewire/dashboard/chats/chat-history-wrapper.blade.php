<div class="chat-history-wrapper" wire:poll="$dispatch('loadConversation', { conversation: {{ $selectedConversation }}, receiver: {{ $receiverInstance }} })">
    {{-- wire:poll="$dispatch('loadConversation', { conversation: {{ $selectedConversation }}, receiver: {{ $receiverInstance }} })" --}}
    <div class="chat-history-header border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex overflow-hidden align-items-center">
                <i class="mdi mdi-menu mdi-24px cursor-pointer d-lg-none d-block me-3" data-bs-toggle="sidebar"
                    data-overlay data-target="#app-chat-contacts"></i>

                @if ($selectedConversation)
                    @include('livewire.dashboard.chats.components.avatar', ['receiverInstance' => $receiverInstance])
                @endif
            </div>
            
            {{-- @if ($selectedConversation)
                @include('livewire.dashboard.chats.components.chat-header-actions')
            @endif --}}
        </div>
    </div>

    <div class="chat-history-body">
        @if ($selectedConversation)
            @include('livewire.dashboard.chats.components.chat-messages', ['messages' => $messages])
        @else
            <div class="h4 text-center text-primary" style="margin-top: 8rem; margin-bottom: 14rem;">
                No conversation selected
            </div>
        @endif
    </div>

    {{-- <button onclick="scrollToBottom()">Scroll ke Bawah</button> --}}

    <livewire:dashboard.chats.chat-send-message />

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Kode Anda di sini akan dijalankan setelah DOM sepenuhnya dimuat
            Livewire.on('rowChatToBottom', data => {
                $('.chat-history-body').animate({
                    scrollTop: $('.chat-history-body')[0].scrollHeight + 500
                }, 200);
            });

            $('.chat-history-body').on('scroll', () => {
                var top =  $('.chat-history-body').scrollTop();
                console.log('top:' + top);
                if (top == 0) {
                    Livewire.dispatch('loadMore');
                }
            });

            Livewire.on('updateHeight', data => {
                let old = data[0].height;
                let newHeight = $('.chat-history-body')[0].scrollHeight;
                let height = $('.chat-history-body').scrollTop(newHeight - old);
                Livewire.dispatch('updateHeight', { height: height});

            });
            
        });
    </script>
</div>
