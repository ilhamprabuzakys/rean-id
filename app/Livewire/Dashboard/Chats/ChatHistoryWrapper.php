<?php

namespace App\Livewire\Dashboard\Chats;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatHistoryWrapper extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $messages;
    public $messages_count;
    public $paginateVar = 10;
    public $height;


    public function getListeners()
    {
        $auth_id = auth()->user()->id;
        return [
            "echo-private:chat.{$auth_id},MessageSent" => 'broadcastedMessageReceived',
        ];
    }

    public function broadcastedMessageReceived($data)
    {
        dd($data);
        // \Illuminate\Support\Facades\Log::info($event);
    }

    // public function getListeners()
    // {
    //     $auth_id = auth()->user()->id;
    //     return [
    //         "echo-private:chat.{$auth_id},SimpleBroadcastEvent" => 'handleSimpleEvent',
    //     ];
    // }

    // public function handleSimpleEvent($data)
    // {
    //     \Illuminate\Support\Facades\Log::info($data);
    //     // dd($data);
    // }

    #[On('pushMessage')]
    public function receivePushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);
        $this->dispatch('rowChatToBottom');
    }

    #[On('loadMore')]
    public function getLoadMore()
    {
        $this->paginateVar += 10;
        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->skip($this->messages_count - $this->paginateVar)->take($this->paginateVar)->get();

        $height = $this->height;
        $this->dispatch('updateHeight', [
            'height' => $height
        ]);
    }

    #[On('updateHeight')]
    public function updateHeight($height)
    {
        $this->height = $height;
    }


    #[On('loadConversation')]
    public function getConversation(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->skip($this->messages_count - $this->paginateVar)->take($this->paginateVar)->get();
        // $this->dispatch('chatSelected');
        $this->dispatch('chatSelected');
    }

    #[On('newMessageLoaded')]
    public function render()
    {
        return view('livewire.dashboard.chats.chat-history-wrapper');
    }
}
