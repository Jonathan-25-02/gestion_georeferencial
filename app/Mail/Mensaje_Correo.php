<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mensaje_Correo extends Mailable
{
    use Queueable, SerializesModels;

    public $contenidoHtml;

    public function __construct($contenidoHtml)
    {
        $this->contenidoHtml = $contenidoHtml;
    }

    public function build()
    {
        return $this->html($this->contenidoHtml);
    }
}
