<?php

namespace App\Events;

use App\Models\Lelang;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOffer implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Offer
     */
    public $auction;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Lelang $auction)
    {
        $this->auction = $auction;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('lelang.' . $this->auction->id_lelang);
    }

    public function broadcastWith()
    {
        $arr = $this->auction->toArray();

        $arr['penawaran'] = $this->auction->penawaran()->orderBy('penawaran_harga', 'desc')->get();
        $arr['barang'] = $this->auction->barang;

        return $arr;
    }
}
