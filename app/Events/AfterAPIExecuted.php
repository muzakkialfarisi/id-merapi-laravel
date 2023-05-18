<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AfterAPIExecuted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public
        $log;

    public function __construct($log = null)
    {
        $this->log = $log;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
