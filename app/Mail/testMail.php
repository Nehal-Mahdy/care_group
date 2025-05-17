<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contentText;

    /**
     * Create a new message instance.
     *
     * @param string $content
     */
    public function __construct($content)
    {
        $this->contentText = $content;
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Test Mail',
            from: 'nehalmahdy927@gmail.com', // Ensure you have a valid "from" address
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.testMail',  // Ensure this view exists
            with: [
                'content' => $this->contentText, // Pass dynamic data to the view
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.testMail')
            ->with([
                'content' => $this->contentText ?? 'Default content' // Add a fallback value
            ])
            ->subject('Test Email');
    }

}
