<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mainsettings;
class Sendmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $message;
     public $allmainsettings;
    public function __construct($messagefromcontroller)
    {
        $this->message=$messagefromcontroller;
        $this->allmainsettings=Mainsettings::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(' رساله من السادات العقاريه المتحده')
            ->markdown('mail/sendmail');    }
}
