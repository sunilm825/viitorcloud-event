<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ActionEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $actionData;

  /**
    * Create a new event instance.
    *
    * @author Author
    *
    * @return void
    */
    public function __construct($actionData)
    {
        $this->actionData = $actionData;
        //   dd($this->actionData);
    }

  /**
    * Get the channels the event should broadcast on.
    *
    * @author Author
    *
    * @return Channel|array
    */
    public function broadcastOn()
    {
        return ['vc-channel'];
        //return new Channel(['vc-channel']);
    }

    /**
     * Get the data to broadcast.
     *
     * @author Author
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'actionData' => $this->actionData,
        ];
    }
}