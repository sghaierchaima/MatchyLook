<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationCommandeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $commande;
    public $user;
    public $details_commande;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($commande, $user, $details_commande)
    {
        $this->commande = $commande;
        $this->user = $user;
        $this->details_commande = $details_commande; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation de commande')->view('frontend.emailconfirmation');
    }
}
