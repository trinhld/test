<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailUpdateUser extends Mailable
{
    use Queueable, SerializesModels;

    private $userName;

    private $otp;

    private $userEmail;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $otp, $userEmail)
    {
        $this->userName = $userName;
        $this->otp = $otp;
        $this->userEmail = $userEmail;
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        $userEmail = $this->userEmail;

        Mail::send('admin/mail/send_mail_update_user',
            ['userName' => $this->userName, 'otp' => $this->otp], function ($message) use ($userEmail) {
                $message->to($userEmail)->subject(trans('mail-attributes.update_email'));
            });
    }
}
