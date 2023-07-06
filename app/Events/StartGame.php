<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StartGame implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private string $id;

    private string $username;
    private int $rating;
    private string $country;

    /**
     * Create a new event instance.
     */
    public function __construct($id, $username, $rating, $country)
    {
        $this->id = $id;

        $this->username = $username;
        $this->rating = $rating;
        $this->country = $country;
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
        return 'start';
    }
    public function broadcastWith() {
        return [
            'username' => $this->username,
            'rating' => $this->rating,
            'country' => $this->country,
        ];
    }
}
