<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\BaiViet;
use Illuminate\Session\Store;

class Xem
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }
    public function handle(BaiViet $bv)
    {
        if (!$this->isPostViewed($bv))
	    {
	        $bv->increment('luotxem');
	        $this->storePost($bv);
	    }
    }
    private function isPostViewed($bv)
	{
	    $viewed = $this->session->get('viewed_posts', []);

	    return array_key_exists($bv->id, $viewed);
	}

	private function storePost($bv)
	{
	    $key = 'viewed_posts.' . $bv->id;

	    $this->session->put($key, time());
	}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
