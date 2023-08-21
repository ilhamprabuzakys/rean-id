<div>
    @if ($selectedConversation)
    <div class="chat-history-footer">
        <form class="form-send-message d-flex justify-content-between align-items-center" wire:submit='sendMessage()'>
            <input class="form-control message-input me-3 shadow-none" placeholder="Type your message here"
                wire:model='body' id="body">
            <div class="message-actions d-flex align-items-center">
                <i
                    class="btn btn-text-secondary btn-icon rounded-pill speech-to-text mdi mdi-microphone mdi-20px cursor-pointer"></i>
                <label for="attach-doc" class="form-label mb-0">
                    <i
                        class="mdi mdi-paperclip mdi-20px cursor-pointer btn btn-text-secondary btn-icon rounded-pill me-2 ms-1"></i>
                    <input type="file" id="attach-doc" hidden>
                </label>
                <button class="btn btn-primary d-flex send-msg-btn" type="submit">
                    <span class="align-middle"><i class="fas fa-paper-plane"></i></span>
                </button>
            </div>
        </form>
    </div>
    @endif
</div>