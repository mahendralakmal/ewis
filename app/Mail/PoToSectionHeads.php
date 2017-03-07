<?php

namespace App\Mail;

use App\Client;
use App\P_Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PoToSectionHeads extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;
    public $client;
    public $agent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, P_Order $order, User $agent)
    {
        $this->user = $user;
        $this->order = $order;
        $this->agent = $agent;
        $this->client = Client::find($order->client_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.PoToSectionHead');
    }
}
