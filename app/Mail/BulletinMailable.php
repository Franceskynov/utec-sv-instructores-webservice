<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BulletinMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $headerMessage;
    public $message;
    public $footerMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $headerMessage, $message, $footerMessage)
    {
        $this->subject = $subject;
        $this->headerMessage = $headerMessage;
        $this->message = $message;
        $this->footerMessage = $footerMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'headerMessage' =>  $this->headerMessage,
            'message' => $this->message,
            'footerMessage' => $this->footerMessage
        ];
        return $this->view('notifications.bulletin_email_template', compact('data'));
    }
}
