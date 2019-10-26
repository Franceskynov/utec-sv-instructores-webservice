<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Asignacion;
use App\Utils\Constants;

class AsignacioneMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $id;
    public $subject;
    public $mode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $subject, $mode)
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->mode = $mode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $asignacion = Asignacion::find($this->id);

        $data = [
            'ciclo'      => $asignacion->ciclo->nombre,
            'horario'    => $asignacion->horario->nombre_dia . ' '. $asignacion->horario->inicio .' - '. $asignacion->horario->fin,
            'materia'    => $asignacion->materia->nombre,
            'docente'    => $asignacion->docente->nombre,
            'Estado'     => ($asignacion->is_enabled == 1) ? 'Asignada / En progreso' : 'Finalizada',
            'aula'       => $asignacion->aula->codigo,
            'instructor' => $asignacion->instructor->nombre,
            'headerMessage' =>  ($this->mode == 'create') ? Constants::EMAIL_ASIGNATION_HEADER_MESSAGE : Constants::EMAIL_ASIGNATION_MODIFY_HEADER_MESSAGE,
            'footerMessage' => Constants::EMAIL_ASIGNATION_FOOTER_MESSAGE
        ];
        return $this->view('notifications.asignations_email_template', compact('data'));
    }
}
