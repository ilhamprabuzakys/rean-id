<div>
    @if ($selectedConversation)
    <div class="chat-history-footer">
        <form class="form-send-message d-flex justify-content-between align-items-center" wire:submit='sendMessage()'>
            <input class="form-control message-input me-3 shadow-none" placeholder="Type your message here"
                wire:model='body' id="body">
            <div class="message-actions d-flex align-items-center">
                <button class="btn btn-primary d-flex send-msg-btn" type="submit">
                    <span class="align-middle"><i class="fas fa-paper-plane"></i></span>
                </button>
            </div>
        </form>
    </div>
    @endif
</div>