<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $svgContent;

    public function __construct($data, $svgContent)
    {
        $this->data = $data;
        $this->svgContent = $svgContent;
    }

    public function build()
    {
        return $this->view('email.certificate_created')
                    ->with('data', $this->data)
                    ->with('svgContent', $this->svgContent);
    }
}
