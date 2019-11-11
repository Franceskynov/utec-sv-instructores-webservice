<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Utils\Constants;

class InstructorQuerieMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $email;
    public $secret;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email, $secret)
    {
        $this->subject = $subject;
        $this->email = $email;
        $this->secret = $secret;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'url'           => env('APP_URL') . '/#/login',
            'email'         => $this->email,
            'password'      => $this->secret,
            'headerMessage' => Constants::EMAIL_INSTRUCTOR_QUERIE_HEADER_MESSAGE,
            'footerMessage' => Constants::EMAIL_INSTRUCTOR_QUERIEL_FOOTER_MESSAGE
        ];
        return $this->view('notifications.users_email_template', $data);
    }
}
