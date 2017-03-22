<?php

namespace App\Mail;

use App\Client;
use App\P_Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PoCompleted extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;
    public $client;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, P_Order $po)
    {
        $this->user = $user;
        $this->order = $po;
        $this->client = Client::find($po->client_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.PoCompleted');
    }
}
