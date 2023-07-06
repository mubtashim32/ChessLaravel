<?php

namespace App\Events;

use App\Models\Moves;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlayGameEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private string $id;
    private Moves $move;

    /**
     * Create a new event instance.
     */
    public function __construct($id, $move)
    {
        $this->id = $id;
        $this->move = $move;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel($this->id),
        ];
    }
    public function broadcastAs() {
        return 'livex';
    }
    public function broadcastWith() {
        return [
            'move' => $this->move,
        ];
    }
}
