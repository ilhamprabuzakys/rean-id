<?php

namespace App\Livewire\Dashboard\Chats;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatList extends Component
{
    public $auth_id;
    public $conversation_active_id;
    public $conversations;
    public $receiverInstance;
    public $selectedConversation;

    #[On('chatUserSelected')]
    public function chatUserSelected(Conversation $conversation, $receiverId)
    {
        // dd($conversation, $receiverId);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = User::find($receiverId);
        $this->conversation_active_id = $conversation->id;
        $this->dispatch('updateSendMessage', 'Conversation', 'Receiver')->to(ChatSendMessage::class);
        $this->dispatch('loadConversation', 'Conversation', 'Receiver')->to(ChatHistoryWrapper::class);
        // dd($this->conversation_active_id);
    }
    
    public function getChatUserInstance(Conversation $conversation, $request)
    {
        $this->auth_id = auth()->user()->id;
        // get selected conversation.
        if ($conversation->sender_id == $this->auth_id)
        {
            $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
        } else {
            $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
        }

        if (isset($request)) {
            return $this->receiverInstance->$request;
        }
    }

    // public function mount()
    // {
    //     $this->auth_id = auth()->user()->id;
    //     $this->conversations = Conversation::with(['user', 'messages'])->where('sender_id', $this->auth_id)
    //     ->orWhere('receiver_id', $this->auth_id)
    //     ->orderBy('last_time_message', 'DESC')
    //     ->get();
    // }

    #[On('refresh')]
    public function render()
    {
        $this->auth_id = auth()->user()->id;
        $this->conversations = Conversation::with(['user', 'messages'])->where('sender_id', $this->auth_id)
        ->orWhere('receiver_id', $this->auth_id)
        ->orderBy('last_time_message', 'DESC')
        ->get();
        return view('livewire.dashboard.chats.chat-list');
    }

    #[On('refreshList')]
    public function reloadComponent()
    {
        // dd('refresh oi');
        $this->render();
    }

}
