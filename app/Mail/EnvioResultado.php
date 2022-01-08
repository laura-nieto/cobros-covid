<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioResultado extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject = 'Resultado prueba COVID';
    
    public $paciente,$resultado;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($paciente,$resultado)
    {
        $this->resultado = $resultado;
        $this->paciente = $paciente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.envioResultado');
    }
}
