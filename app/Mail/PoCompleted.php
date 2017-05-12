<?php

namespace App\Mail;

use App\Client;
use App\ClientsBranch;
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
    public $client_branch;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, P_Order $po)
    {
        $this->user = $user;
        $this->order = $po;
        $this->client_branch = ClientsBranch::find($po->clients_branch_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('EWIS Peripherals Order Management System - Your Order has been Completed')->view('emails.PoCompleted');
    }
}
