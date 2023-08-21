<?php

namespace App\Events;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $conversation;
    public $receiver;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user, Message $message, Conversation $conversation, User $receiver)
    {
        $this->user = $user;
        $this->message = $message;
        $this->conversation = $conversation;
        $this->receiver = $receiver;
    }

    public function broadcastWith(): array
    {
        $data = [
            'user_id' => $this->user->id,
            'message' => $this->message->id,
            'conversation_id' => $this->conversation->id,
            'receiver_id' => $this->receiver->id,
        ];
        \Illuminate\Support\Facades\Log::info('Broadcasting data:');
        \Illuminate\Support\Facades\Log::info($data);
        return $data;
    }
    

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        // dd($this->user);
        // \dump('asasa');
        \Illuminate\Support\Facades\Log::info('USER: ' . $this->user->name);
        \Illuminate\Support\Facades\Log::info('RECEIVER: ' . $this->receiver->name);
        return new PrivateChannel('chat.' . $this->receiver->id);
    }
}
