<?php

namespace App\Mail;

use App\P_Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PoToAdministration extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $po;
    public $agent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, P_Order $po, User $agent)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.PoToAdministration');
    }
}
