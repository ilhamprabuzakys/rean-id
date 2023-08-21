<?php

namespace App\Livewire\Dashboard\Chats;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatSendMessage extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $createdMessage;
    public $body;

    #[On('updateSendMessage')]
    public function getConversation(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
        // $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();
        // $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
        // ->skip($this->messages_count - $this->paginateVar)->take($this->paginateVar)->get();
    }
    
    public function sendMessage()
    {
        if ($this->body == '' || $this->body == null) {
            return null;
        }

        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();
        
        $this->dispatch('pushMessage', $this->createdMessage->id)->to(ChatHistoryWrapper::class);
        $this->dispatch('refresh')->to(ChatList::class);

        $this->reset('body');

        $this->dispatch('dispatchMessageSent')->self();
    }

    #[On('dispatchMessageSent')]
    public function dispatchMessageSent()
    {
        // dd('as');
        $broadcast = broadcast(new MessageSent(auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
        // $broadcast = MessageSent::dispatch(auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance);
        // dd($broadcast);
        // broadcast
        // MessageSent::dispatch(auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance);
        \Illuminate\Support\Facades\Log::info('Event broadcasted: ', [$broadcast]);
    
        // Broadcast::broadcast(new MessageSent(auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
    }

    public function render()
    {
        return view('livewire.dashboard.chats.chat-send-message');
    }

}
