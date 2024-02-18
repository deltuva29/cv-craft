<?php

namespace App\Mail;

use App\Models\Share;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ShareRequest extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public array $data;

    public function __construct(
        protected Share $share,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->share->email, $this->share->resume->owner->name),
            subject: __('Share Resume(CV) request from :email', ['email' => $this->share->email]),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.share',
            with: [
                'share' => $this->share,
                'url' => route('view.share', $this->share->token),
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}