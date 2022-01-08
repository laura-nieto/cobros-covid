<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RechazoCortesia extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject = 'Rechazo para prueba COVID';
    
    public $apellido,$nombre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($apellido,$nombre)
    {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.rechazoCortesia');
    }
}
