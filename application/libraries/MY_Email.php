<?php

class MY_Email extends CI_Email {
    
    public function __construct($config = array()) {
        parent::__construct($config);
    }
    
    public function enviaCorreo($datosEmail) {
        $this->from('helpdesk@hircasa.com', 'HIR Casa IT');
        //$this->to($datosEmail['destinatario']);
        $this->to('jmartinez@hircasa.com');
        $this->subject($datosEmail['asunto']);
        $this->message($datosEmail['body']);
        
        $this->send();
    }

}
