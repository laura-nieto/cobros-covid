<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioCita extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject = 'Envío de Cita para prueba COVID';

    public $nombre,$apellido,$dia,$hora,$lugar,$svg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$apellido,$dia,$hora,$lugar)
    {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->lugar = $lugar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.envioCita');
    }
}
