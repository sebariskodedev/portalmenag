<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DumasMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // You can pass data to your email here

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function build()
    {
        $email = $this->subject('Mail Info') // Set the email subject
                    ->html('
                        <html>
                            <head>
                                <title>Pengaduan Masyarakat</title> <!-- Email title -->
                            </head>
                            <body>
                                <h1>Pengaduan Masyarakat</h1>
                                <br>
                                <span>Aduan dari : ' . $this->data['name'] . '(' . $this->data['sender'] . ')' . '</span>
                                <br>
                                <span>Pesan : ' . $this->data['message'] . '</span>
                            </body>
                        </html>
                    ');

        // Check if a file URL is provided
        if (!empty($this->data['file_url'])) {
            $fileUrl = $this->data['file_url'];

            // Extract the file name and extension from the URL
            $fileName = basename($fileUrl); // Get the file name
            $extension = pathinfo($fileName, PATHINFO_EXTENSION); // Get the file extension

            // Determine the MIME type based on the file extension
            $mimeType = match (strtolower($extension)) {
                'pdf' => 'application/pdf',
                'jpg', 'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'txt' => 'text/plain',
                'doc', 'docx' => 'application/msword',
                'xls', 'xlsx' => 'application/vnd.ms-excel',
                'zip' => 'application/zip',
                default => 'application/octet-stream', // Fallback MIME type
            };

            // Attach the file
            $email->attach($fileUrl, [
                'as' => $fileName, // Use the extracted file name
                'mime' => $mimeType, // Use the determined MIME type
            ]);
        }

        return $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Dumas Mailable',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
}
