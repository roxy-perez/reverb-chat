<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class YouAreTheWinner implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public User $user, public string $message) {}

    public function broadcastAs(): string
    {
        return 'you-are-the-winner';
    }

    public function broadcastWith(): array
    {
        return [
            'user' => $this->user,
            'message' => $this->message,
        ];
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\PrivateChannel
     */
    /******  546a2a00-b6b6-402f-aa95-f7c98a67572c  *******/
    public function broadcastOn(): PrivateChannel
    {
        return new PrivateChannel('App.Models.User.' . $this->user->id);
    }
}
