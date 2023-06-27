<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogEventAction
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $event;
    public $subject;
    public $description;

    /**
     * Create a new event instance.
     */
    public function __construct($event, $subject, $description = null)
    {
        $this->event = $event;
        $this->subject = $subject;
        $this->description = $description;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
