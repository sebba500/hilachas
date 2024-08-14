<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrdenMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre_proveedor;
    public $nombre_archivo;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre_proveedor,$nombre_archivo)
    {
        $this->nombre_proveedor = $nombre_proveedor;
        $this->nombre_archivo = $nombre_archivo;
    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email_orden')
        ->from("sistema@certilab.cl","Sistema prueba")
        ->subject("Envío de prueba")
        ->attach($this->nombre_archivo, [
            'as' => 'orden_compra.pdf', // Nombre del archivo en el correo
            'mime' => 'application/pdf',   // Tipo MIME del archivo
        ]);
  
    }
}
