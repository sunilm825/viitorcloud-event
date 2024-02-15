<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

/**
 * TestEvents
 */
class TestEvents implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userRecords = [];

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userRecords)
    {
        $this->userRecords = $userRecords;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('viitorcloud-event');
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'message';
    }
    /**
     * The event's broadcast data.
     *
     * @return string
     */
    public function broadcastWith()
    {
        return $this->userRecords;
    }
}
