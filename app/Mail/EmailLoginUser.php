<?php namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailLoginUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * URL to send in email for authenticate.
     *
     * @var string
     */
    public $url;

    /**
     * EmailLoginUser constructor.
     *
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Login to okVCard')->view('auth.emails.email');
    }
}
