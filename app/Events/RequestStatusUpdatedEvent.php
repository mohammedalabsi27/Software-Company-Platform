<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RequestStatusUpdatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $request;

    public function __construct($userId, $request)
    {
        $this->userId = $userId;
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.' . $this->userId),
        ];
    }

    public function broadcastWith()
    {
        return [
            'title' => 'Request Status Updated',
            'request_id' => $this->request->id,
            'status' => $this->request->status,
            'admin_note' => $this->request->admin_note,
            'message' => "Your request #{$this->request->id} status has been updated to '{$this->request->status}'.",
        ];
    }

    public function broadcastAs()
    {
        return 'request.updated';
    }

}

