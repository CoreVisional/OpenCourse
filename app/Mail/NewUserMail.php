<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;

class NewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    protected User $user;
    protected String $loginUrl;
    protected String $resetPasswordUrl;
    protected String $tempPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $tempPassword, $loginUrl, $resetPasswordUrl)
    {
        $this->user = $user;
        $this->tempPassword = $tempPassword;
        $this->loginUrl = $loginUrl;
        $this->resetPasswordUrl = $resetPasswordUrl;
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->user->email,
            subject: 'Your New Account Details',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        $supportEmail = "support@opencourse.net";

        Session::put([
            'notice' => 'Email sent successfully.',
            'noticeBg' => 'alert-success',
        ]);

        return new Content(
            view: 'emails.admin.new-user',
            with: [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'password' => $this->tempPassword,
                'loginUrl' => $this->loginUrl,
                'resetPasswordUrl' => $this->resetPasswordUrl,
                'supportEmail' => $supportEmail,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
