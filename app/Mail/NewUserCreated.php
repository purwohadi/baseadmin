<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $emailBody;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $emailBody = null, $emailTitle = null)
    {
        $this->emailBody = $emailBody;
        $this->emailTitle = $emailTitle?:"Welcome to the UmaHub Student Portal";
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->emailBody){
            return $this->subject($this->emailTitle)
                ->text('emails.user_created_custom_text');
        }

        return $this->subject($this->emailTitle)
            ->view('emails.user_created_default_text');
    }

}
