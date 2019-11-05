<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Utils\Constants;

class EvaluationMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $assignationName;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($assignationName, $subject)
    {
        $this->assignationName = $assignationName;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'url'           => env('APP_URL') . '/#/login?returnUrl=/autoEvaluacion/' . $this->assignationName,
            'headerMessage' => Constants::EMAIL_EVALUATION_SELFAPPRAISAL_HEADER_MESSAGE,
            'footerMessage' => Constants::EMAIL_EVALUATION_SELFAPPRAISAL_FOOTER_MESSAGE
        ];
        return $this->view('notifications.evaluation_email_template', compact('data'));
    }
}
