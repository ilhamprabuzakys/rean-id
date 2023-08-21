<div>
    <div class="app-chat card overflow-hidden">
        <div class="row g-0">
            <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end"
                id="app-chat-contacts">
                <div class="sidebar-body">
                    <!-- Chat & Contacts -->
                    <livewire:dashboard.chats.chat-list />
                    <livewire:dashboard.chats.chat-create />
                    <!-- /Chat contacts -->
                </div>
            </div>

            <!-- Chat History -->
            <div class="col app-chat-history">
                <livewire:dashboard.chats.chat-history-wrapper />
            </div>
            <!-- /Chat History -->

            <!-- Sidebar Right -->
            <livewire:dashboard.chats.chat-sidebar-information />
            <!-- /Sidebar Right -->

            <div class="app-overlay"></div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Kode Anda di sini akan dijalankan setelah DOM sepenuhnya dimuat
            Livewire.on('chatSelected', data => {
                setTimeout(function() {
                    $('.chat-history-body').scrollTop($('.chat-history-body')[0].scrollHeight+1000);
                }, 500);

                let height = $('.chat-history-body')[0].scrollHeight;
                Livewire.dispatch('updateHeight', {
                    height: height,
                });
            });
        });
        // window.addEventListener('chatSelected2', e => {
        //     setTimeout(function() {
        //         $('.chat-history-body').scrollTop($('.chat-history-body')[0].scrollHeight);
        //     }, 600); // Anda bisa menyesuaikan durasi timeout sesuai kebutuhan.
        // });
    </script>
</div>