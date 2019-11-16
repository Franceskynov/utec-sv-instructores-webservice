<?php

namespace App\Mail;

use App\Utils\Constants;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeCredentialsMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $email;
    public $host;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email, $host)
    {
        $this->subject = $subject;
        $this->email = $email;
        $this->host = $host;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'url'           => $this->host . '/admin/#/login',
            'email'         => $this->email,
            'password'      => '********',
            'headerMessage' => Constants::EMAIL_USER_CHANGE_CREDENTIALS_HEADER_MESSAGE,
            'footerMessage' => Constants::EMAIL_USER_CHANGE_CREDENTIALS_FOOTER_MESSAGE
        ];
        return $this->view('notifications.users_email_template', $data);
    }
}
